<?php


namespace App\Http\Resources\CurrencyConverterResources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DatabaseInsertionResource extends JsonResource
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
            'from_currency_code' => $this->fromCurrencyCode,
            'from_currency_amount' => $this->from_currency_amount,
            'from_currency_formatted_amount' => $this->from_currency_formatted_amount,
            'to_currency_code' => $this->getCurrency()->getCode(),
            'to_currency_true_amount' => $this->getTrueAmount($amount),
            'to_currency_formatted_amount' => $this->getFormattedAmount($amount),
            'fee_amount' => $this->getFeeAmount(),
            'formatted_fee_amount' => $this->getFormattedFeeAmount(),
//            'formatted_fee_amount_in_irr' => $this->getFormattedFeeAmount(),
            'tracking_code' => $this->tracking_code
        ];
    }
}
