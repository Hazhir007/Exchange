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
            'amount' => $amount,
            'formattedAmount' => $this->getFormattedAmount($amount),
            'trueAmount' => $this->getTrueAmount($amount),
            'currency_name' => $this->getCurrency()->getName(),
            'currency_code' => $this->getCurrency()->getCode()

        ];
    }
}
