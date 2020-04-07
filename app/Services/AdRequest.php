<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;

use AdRequestModel;

class AdRequest {

  use CreateKey;
  use FindByKey;

  public function create($request)
  {
    $adRequestInputs = $request['adRequest'];
    $adRequestInputs['key']= $this->createKey();
    $adRequestInputs['user_id'] = auth()->id();
    $adRequest = AdRequestModel::create($adRequestInputs);
    return $adRequest;
  }

  public function update($request,$key)
  {
    try {
      $adRequest = AdRequestModel::where('key', $key)->first();
      $adRequest->fill($request['adRequest'])->save();
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }
    return $adRequest;
  }
  // ポリモーフィズムで create するため model を使う
  public function saves($model, array $requests)
  {
      $requests = ArrayUtil::snakelizeKey($requests);
      $newMenus = [];

      DB::transaction(function () use ($model, $requests) {
          $model->menus()->delete();
          foreach ($requests as $request) {
              $attributes = [
                // 例
                  'key'       => $this->createKey(),
                  'name'      => $request['name'] ?? null,
              ];
              $newMenus[] = $model->menus()->create($attributes);
          }
      });

      return $newMenus;
  }

  // ポリモーフィズムで create するため model を使う
  public function save($model, array $params)
  {
      $params = ArrayUtil::snakelizeKey($params);
      $attributes = [
          'key'       => $params['key'] ?? null,
          'name'      => $params['name'] ?? null,
      ];
      $request = RequestModel::where('key', $attributes['key'])->first();

      if (is_null($request)){
          $attributes['key'] = $this->createKey();
          $request = $model->request()->create($attributes);
      }
      else {
          $request->update($attributes);
      }

      return $request;
  }

  public function delete(string $key)
  {
      try {
          $request = RequestModel::where('key', $key)->firstOrFail();
          $request->delete();
          return true;
      } catch (ModelNotFoundException $e) {
          logger()->error('RequestModel not found.', ['error' => $e]);
          throw new \Exception('RequestModel を取得できなかった');
      } catch (\Exception $e) {
          logger()->error('RequestModel deleting is failed.', ['error' => $e]);
          throw new \Exception('RequestModel を削除できなかった');
      }
      return false;
  }
}