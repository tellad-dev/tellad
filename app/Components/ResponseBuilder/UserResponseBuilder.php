<?php 

namespace App\Components\ResponseBuilder;

use Illuminate\Http\{Response, JsonResponse};

class UserResponseBuilder
{
  public function createResponse(?array $data): JsonResponse
  {
    return response()->json('a');
  }
  /**
   * Dataを整形する
   * 
   * @param UserModel
   * @return array|null
   */
  public function formatData($user): ?array
  {
    // try {
    //   $userData = [

    //   ];

    //   // TODO ユーザーのタイプによって処理を変える
    // }
    // catch (\Exception $e) {
    //   logger()->error('UserResponseBuilder::formatData error.', ['error' => $e]);
    //   return null;
    // }

    return $user;
  }

  /**
   * ValidationError　のレスポンス
   * 
   * return JsonResponse $response
   */
  public function validationError(): JsonResponse 
  {
    return response()->json([
      'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
      'message' => 'Email or Password is wrong.',
      'details' => [],
    ], Response::HTTP_UNPROCESSABLE_ENTITY);
  }
}
