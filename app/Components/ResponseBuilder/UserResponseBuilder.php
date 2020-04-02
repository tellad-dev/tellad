<?php 

namespace App\Components\ResponseBuilder;

use Illuminate\Http\{Response, JsonResponse};

class UserResponseBuilder
{
  /**
   * Dataを整形する
   * 
   * @param UserModel
   * @return array|null
   */
  public function formatData($user): ?array
  {
    try {
      $user->profile;
      $user->adRequests;
      $user->shops;
      if($user->shops){
          foreach($user->shops as $shop){
              $shop->shopImages;
              $shop->customerFeatures;
              $shop->shopFeatures;
              foreach($shop->spaces as $space){
                  $space->spaceForms;
                  $space->spaceImages;
              };
          };
      };
      $user->businesses;
      if($user->businesses){
          foreach($user->businesses as $business){
              foreach($business->ads as $ad){
                  $ad->targets;
                  $ad->adImages;
                  $ad->adForms;
                  $ad->adRequests;
              };
          };
      };
      $userData = [
        'user'    =>$user,
      ];

      // TODO ユーザーのタイプによって処理を変える
    }
    catch (\Exception $e) {
      logger()->error('UserResponseBuilder::formatData error.', ['error' => $e]);
      return null;
    }

    return $userData;
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
