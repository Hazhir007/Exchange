<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'from_currency' => $this->from_currency_code,
            'from_currency_amount' => $this->from_currency_formatted_amount,
            'to_currency_code' => $this->to_currency_code,
            'to_currency_amount' => $this->to_currency_true_amount,
            'fee_amount' => $this->formatted_fee_amount,
            'tracking_code' => $this->tracking_code
        ];
    }
}
