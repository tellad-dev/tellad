<?php 

namespace App\Components\ResponseBuilder;

use Illuminate\Http\{Response, JsonResponse};

class ApiResponseBuilder
{
  /**
   * 処理成功のレスポンス
   * @param string $method
   * @return JsonResponse $response
   */
  public function success(string $method): JsonResponse
  {
    return response()->json([
      'code'    => Response::HTTP_OK,
      'message' => $method . ' Success.',
    ], Response::HTTP_OK);
  }

  /**
   * ページネーションのバリデーションエラー
   * 
   * @param int $page
   * @return JsonResponse $response
   */
  public function invalidPage(int $page): JsonResponse
  {
    return response()->json([
      'code'    => Response::HTTP_BAD_REQUEST,
      'message' => 'Bad Request',
      'details' => [
        [
          'field'    => 'page',
          'messages' => ['The page must be less than lastPage'],
          'value'    => $page,
        ],
      ],
    ], Response::HTTP_BAD/REQUEST);
  }

  /**
   * API Response を作成する
   * 
   * @param array $data
   * @return JsonResponse $response
   */
  public function createResponse(?array $data): JsonResponse
  {
    return response()->json($data, Response::HTTP_OK, [],
    JSON_PRESERVE_ZERO_FRACTION);
  }


  /**
   * 認証失敗のレスポンス
   * 
   * @return JsonResponse $response
   */
  public function unauthorized(): JsonResponse
  {
    return response()->json([
      'code'    => Response::HTTP_UNAUTHORIZED,
      'message' => 'Unauthorized.',
    ], Response::HTTP_UNAUTHORIZED);
  }

  /**
   * Model NotFound のレスポンス
   * 
   * @param string $field
   * @param string|null $key
   * @return JsonResponse $response
   */
  public function modelNotFound(string $field, ?stirng $key): JsonResponse
  {
    return response()->json([
      'code'    => Response::HTTP_NOT_FOUND,
      'message' => 'Not Found.',
      'details' => [
        [
          'field'    => $field . 'Key',
          'messages' => ['Not found ' . $field . ' in ' . $field . 'Key.'],
          'value'    => $key
        ],
      ],
    ], Response::HTTP_NOT_FOUND);
  }

  /**
   * Internal Server Error Response
   * 
   * @return JsonResponse $response
   */
  public function serverError(): JsonResponse
  {
    return response ()->json([
      'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
      'message' => 'Internal Server Error.',
    ], Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}