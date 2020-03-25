<?php

namespace App\Services;

use Hash;

use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use AdModel;

class Ad
{
  use CreateKey;
  use FindByKey;

  // singup時
  public function create(array $param)
  {
    $param = ArrayUtil::snakelizeKey($param);

    // TODO model編集後
    $attributes = [

    ];

    $user = UserModel::where('email', $attributes['email'])->whereNotNull('email')->first();

    if (is_null($user)){
      $attributes['key'] = $this->createKey();
      $user = UserModel::create($attributes);
    }
    else {
      $user->update($attributes);
    }

    return $user;
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