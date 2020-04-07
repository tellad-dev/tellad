<?php

namespace App\Services;

use Hash;
use Storage;

use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use SpaceModel;

class Space
{
  use CreateKey;
  use FindByKey;

  // singup時
  public function create($request)
  {
    $spaceInputs = $request['space'];
    $spaceInputs['key']= $this->createKey();
    $space = SpaceModel::create($spaceInputs);
    if($request->file('files')){
      $spaceImages = $request->file('files');
      foreach ($spaceImages as $key => $spaceImage) {
        $path = Storage::disk('s3')->putFileAs('spaces', $spaceImage, $space['id'].'-'.$key.'.jpg', 'public');
        $space->spaceImages()->create((['path' => $path]));
      }
    };
    return $space;
  }

  public function update($request,$key)
  {
    try {
      $space = SpaceModel::where('key', $key)->first();
      $space->fill($request['space'])->save();
      if($request->file('files')){
        $spaceImagePaths = $space->spaceImages;
        foreach ($spaceImagePaths as $key => $spaceImagePath) {
          //S3の画像とDBのパスを削除
          Storage::disk('s3')->delete($spaceImagePath['path']);
          $space->spaceImages()->delete();
        }
        $requestImages = $request->file('files');
        foreach ($requestImages as $key => $requestImage) {
          //S3の画像とDBのパスを追加
          $path = Storage::disk('s3')->putFileAs('spaces', $requestImage, $space['id'].'-'.$key.'.jpg', 'public');
          $space->spaceImages()->create((['path' => $path]));
        }
      };
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $space;
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