<?php

namespace App\Components\ResponseBuilder;

use Illuminate\Http\{Response, JsonResponse};
use Illuminate\Database\Eloquent\Collection;

// Component
use ArrayUtil;
use ApiResponseBuilder;

// Model
use AdRequestModel;

class AdRequest
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
    public function formatData($request): ?array
    {
        try {
            $requestData = [
                'name'     => $request->name,
                'value'    => $request->value,
                'minPrice' => $request->min_price,
                'maxPrice' => $request->max_price,
            ];
        }
        catch (\Exception $e) {
            logger()->error('RequestResponseBuilder::formatData error.', ['error' => $e ]);
            return null;
        }

        return $requestData;
    }
}
