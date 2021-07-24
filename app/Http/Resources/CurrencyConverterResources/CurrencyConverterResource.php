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

            'from_currency_code' => $this->fromCurrency->getCurrency()->getCode(),
            'from_currency_amount' => $this->fromCurrency->getAmount(),
            'from_currency_formatted_amount' => $this->fromCurrency->getFormattedAmount(),



            'to_currency_amount' => $this->getFormattedAmount($amount),
            'fee_amount' => $this->getFormattedFeeAmount(),
            'to_currency_name' => $this->getCurrency()->getName(),
            'to_currency_code' => $this->getCurrency()->getCode(),

            'conversion_ratio' => $this->conversionRatio,
        ];
    }
}
