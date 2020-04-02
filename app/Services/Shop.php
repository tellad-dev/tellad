<?php

namespace App\Services;

use Hash;

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
  // singup時
  public function create($request)
  {
    $shopInputs = $request['shop'];
    $shopInputs['key']= $this->createKey();
    $shopInputs['user_id'] = auth()->id();
    $shop = ShopModel::create($shopInputs);
    $shop->shopFeatures()->attach($request['shop_feature_id']);
    $shop->customerFeatures()->attach($request['customer_feature_id']);

    return $shop;
  }

  public function update($request,$key)
  {
    try {
      $shop = ShopModel::where('key', $key)->first();
      $shop = $shop->save($request['shop']);
      return $shop;
      $shop->shopFeatures()->sync($request['shop_feature_id']);
      return $shop;
      $shop->customerFeatures()->detach(); 
      $shop->customerFeatures()->attach($request['customer_feature_id']);
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