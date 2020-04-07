<?php

namespace App\Services;

use Hash;
use Storage;
use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use AdModel;

class Ad
{
  use CreateKey;
  use FindByKey;

  public function create($request)
  {
    $adInputs = $request['ad'];
    $adInputs['key']= $this->createKey();
    $ad = AdModel::create($adInputs);
    $ad->targets()->attach($request['target_id']);
    $forms = $request['form'];
    foreach($forms as $form){
      $ad->adForms()->create(['form' => $form]);
    }
    if($request->file('files')){
      $adImages = $request->file('files');
      foreach ($adImages as $key => $adImage) {
        $path = Storage::disk('s3')->putFileAs('ads', $adImage, $ad['id'].'-'.$key.'.jpg', 'public');
        $ad->adImages()->create(['path' => $path]);
      }
    };
    return $ad;
  }

  public function update($request,$key)
  {
    try {
      $ad = AdModel::where('key', $key)->first();
      $ad->fill($request['ad'])->save();
      $ad->targets()->sync($request['target_id']);
      if($request->file('files')){
        $adImages = $request->file('files');
        $adImagePaths = $ad->adImages;
        foreach ($adImagePaths as $key => $adImagePath) {
          //S3の画像とDBのパスを削除
          Storage::disk('s3')->delete($adImagePath['path']);
          $ad->adImages()->delete();
        }
        foreach ($adImages as $key => $adImage) {
          //S3の画像とDBのパスを追加
          $path = Storage::disk('s3')->putFileAs('ads', $adImage, $ad['id'].'-'.$key.'.jpg', 'public');
          $ad->adImages()->create(['path' => $path]);
        }
      };
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $ad;
  }

  public function save(array $params)
  {
    $params = ArrayUtil::snakelizeKey($params);

    // TODO model編集後
    $attributes = [
      
    ];

    $user = UserModel::where('key', $params['key'])->first();

    if (is_null($user)){
      $attributes['key'] = $this->createKey();
      $user = UserModel::create($attributes);
    }
    else {
      $user->update($attributes);
      $user->touch();
    }

    // TODO ユーザーのタイプによって保存と削除処理

    return $user;
  }

  public function delete(string $key)
  {
    try {
      $user = UserModel::where('key', $key)->firstOrFail();
      $user->delete();
      return true;
    } catch (ModelNotFoundException $e) {
      logger()->error('UserModel not found.', ['error' => $e]);
      throw new \Exception('UserModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('UserModel deleting is failed.', ['error' => $e]);
      throw new \Exception('UserModel を削除できなかった');
    }
    return false;
  }
}