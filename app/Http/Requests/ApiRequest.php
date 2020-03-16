<?php

namespace App\Http\Requests;

use App;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

class ApiRequests extends FormRequest
{
  public function __construct()
  {
    App::setLocale('ja');
  }

  /**
   * Determine if the user is authorized to make this request.
   * 
   * @return bool
   */
  // public function authorize()
  // {
  //   return true;
  // }

  /**
   * @param Validator $validator
   * @throw HttpResponseException
   */
  protected function failedValidation(Validator $validator)
  {
    $validatorErrors = $validator->errors()->toArray();

    $details = [];
    foreach ($validatorErrors as $key =>
    $validatorErrorMessages) {
      $detail = null;
      $detail['property'] = $key;
      foreach ($validatorErrorMessages as $validatorErrorMessage) {
        $detail['messages'][] = $validatorErrorMessage;
      }
      $detail['value'] = $this->input($key);

      $details[] = $detail;
    }
    
    throw new HttpResponseException(
      response()->json([
        'code' => 
        Response::HTTP_UNPROCESSABLE_ENTITY,
        'message' => 'Bad Request.',
        'details' => $details,
      ], Response::HTTP_UNPROCESSABLE_ENTITY)
    );
    
  }
}