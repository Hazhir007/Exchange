<?php

namespace App\Http\Resources\Wallet;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletCreationResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'currency_code' => $this->currency_code,
            'depositStatus' => $this->deposit_status,
            'withdrawStatus' => $this->withdraw_status,
            'amount' => $this->amount
        ];
    }
}
