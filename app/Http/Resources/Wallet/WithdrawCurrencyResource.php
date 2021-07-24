<?php


namespace App\Http\Resources\Wallet;


use Illuminate\Http\Resources\Json\JsonResource;

class WithdrawCurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'currency_code' => $this->currency_code,
            'amount' => $this->amount,
            'status' => $this->status
        ];
    }
}
