<?php

namespace App\Services;

use Hash;
use Storage;
use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ShopModel;
use UserModel;
use ShopFeatureModel;

class Shop
{
  use CreateKey;
  use FindByKey;

  public function create($request)
  {
    $shopInputs = $request['shop'];
    $shopInputs['key']= $this->createKey();
    $shopInputs['user_id'] = auth()->id();
    $shop = ShopModel::create($shopInputs);
    $shop->shopFeatures()->attach($request['shop_feature_id']);
    $shop->customerFeatures()->attach($request['customer_feature_id']);
    if($request->file('files')){
      $shopImages = $request->file('files');
      foreach ($shopImages as $key => $shopImage) {
        $path = Storage::disk('s3')->putFileAs('shops', $shopImage, $shop['id'].'-'.$key.'.jpg', 'public');
        $shop->shopImages()->create((['path' => $path]));
      }
    };
    return $shop;
  }

  public function update($request,$key)
  {
    try {
      $shop = ShopModel::where('key', $key)->first();
      $shop->fill($request['shop'])->save();
      $shop->shopFeatures()->sync($request['shop_feature_id']);
      $shop->customerFeatures()->sync($request['customer_feature_id']);
      if($request->file('files')){
        $shopImages = $request->file('files');
        $shopImagePaths = $shop->shopImages;
        foreach ($shopImagePaths as $key => $shopImagePath) {
          //S3の画像とDBのパスを削除
          Storage::disk('s3')->delete($shopImagePath['path']);
          $shop->shopImages()->delete();
        }
        foreach ($shopImages as $key => $shopImage) {
          //S3の画像とDBのパスを追加
          $path = Storage::disk('s3')->putFileAs('shops', $shopImage, $shop['id'].'-'.$key.'.jpg', 'public');
          $shop->shopImages()->create((['path' => $path]));
        }
      };
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $shop;
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