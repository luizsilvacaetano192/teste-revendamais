<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'address'  => strtoupper($this->address),
            'zip_code' => $this->zip_code,
            'created'  => Carbon::make($this->created_at)->format('Y-m-d'),
            'updated'  => Carbon::make($this->updated_at)->format('Y-m-d')
        ];
    }
}
