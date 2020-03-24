<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class RequestPost extends ApiRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      // 例えばあるユーザーだとこんな感じ
        return [
            // 'type'        => 'required|integer|between:0,2',
            // 'title'       => 'required|string|max:255',
            // 'name'        => 'required|string|max:255',
            // 'postalCode'  => 'required|string|max:8',
            // 'address'     => 'required|string|max:255',
            // 'phoneNumber' => 'required|string|max:14',
            // 'email'       => 'nullable|email|max:255',
            // 'url'         => 'nullable|active_url',
            // 'menus'       => 'required|array',
        ];
    }

    public function getValidatorInstance()
    {
        // TODO: request のバリデーション
        // $this->merge([
        //     'startDate' => implode('-', $this->only(['startYear', 'startMonth', 'startDay'])) . ' 23:59:59',
        // ]);

        return parent::getValidatorInstance();
    }
}