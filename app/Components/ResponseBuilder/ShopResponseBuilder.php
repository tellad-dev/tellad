<?php

namespace App\Components\ResponseBuilder;

use Illuminate\Http\{Response, JsonResponse};
use Illuminate\Database\Eloquent\Collection;

// Component
use ArrayUtil;
use ApiResponseBuilder;

// Model
use ShopModel;

class ShopResponseBuilder
{
    /**
     * メニューのDataListを作成する
     *
     * @param  Collection $requests
     * @return array $requests
     */
    public function list(Collection $requests): array
    {
        $requestsDataList = [];
        foreach ($requests as $request) {
            $requestDataList[] = $this->formatData($request);
        }

        return $requestDataList;
    }

    /**
     * Dataを整形する
     *
     * @param  RequestModel $request
     * @return array|null $requestData
     */
    public function formatData($shop)
    {
        try {
            $shop->shopImages;
            $shop->shopFeatures;
            $shop->customerFeatures;
            foreach($shop->spaces as $space){
                $space->spaceForms;
                $space->spaceImages;
                $space->adRequests;
            };
            $shopData = [
                'shop'  => $shop
            ];
        }
        catch (\Exception $e) {
            logger()->error('ShopResponseBuilder::formatData error.', ['error' => $e ]);
            return null;
        }
        return $shopData;
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
