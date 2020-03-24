<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;

use RequestModel;

class Request {

  use CreateKey;
  use FindByKey;

  // ポリモーフィズムで create するため model を使う
  public function saves($model, array $requests)
  {
      $requests = ArrayUtil::snakelizeKey($requests);
      $newRequests = [];

      DB::transaction(function () use ($model, $requests) {
          $model->request()->delete();
          foreach ($requests as $request) {
              $attributes = [
                // 例
                  'key'       => $this->createKey(),
                  'name'      => $request['name'] ?? null,
              ];
              $newRequests[] = $model->request()->create($attributes);
          }
      });

      return $newRequests;
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