<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed> // array of attributes that should be converted to json when resource is returned as a response
     */
    public function toArray(Request $request): array
    {
        return [ // return an array of attributes that should be converted to json when resource is returned as a response
            'id' => $this->id,
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'type' => $this->type,
            'category_id' => $this->category_id,
            'transaction_date' => $this->transaction_date,
            'description' => $this->description,
            // do shtoj edhe is_paid
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
