<?php

namespace App\Http\Resources\UserResources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
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
            'email' => $this->email,
            'meta' => [
                'token' => $this->token,
                'type' => 'bearer'
            ]
        ];

    }
}
