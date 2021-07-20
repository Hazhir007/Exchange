<?php

namespace App\Http\Resources\CurrencyConverterResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyConverterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $amount = $this->getAmount();
        return [
            'conversion_ratio' => $this->conversionRatio,
            'amount' => $amount,
            'true_amount' => $this->getTrueAmount($amount),
            'fee_amount' => $this->getFeeAmount(),
            'formatted_amount' => $this->getFormattedAmount($amount),
            'formatted_fee_amount' => $this->getFormattedFeeAmount(),
            'currency_name' => $this->getCurrency()->getName(),
            'currency_code' => $this->getCurrency()->getCode(),

        ];
    }
}
