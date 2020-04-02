<?php

namespace App\Services;

use Hash;
use Illuminate\Support\Facades\Auth;
use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use UserModel;

class User
{
  use CreateKey;
  use FindByKey;

  // singup時
  public function create($request)
  {
    $password = bcrypt($request->password);
    $key = $this->createKey();
    $userId = UserModel::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => $password,
      'key' => $key,
    ])->id;
    $credentials = request(['email', 'password']);
    $apiToken = auth("api")->attempt($credentials);
    UserModel::find($userId)->update(['api_token'=>$apiToken]);
    $user = UserModel::find($userId);
    return $user;
  }
  // tokenRefresh
  public function tokenRefresh($user)
  {
    $credentials = request(['email', 'password']);
    $apiToken = auth("api")->attempt($credentials);
    UserModel::find($user['id'])->update(['api_token'=>$apiToken]);
    $user = UserModel::find($user['id']);
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