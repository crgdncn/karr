<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'key' => (new KeyResource($this->key)),
            'vehicle' => (new VehicleResource($this->vehicle)),
            'technician' => (new TechnicianResource($this->technician)),
            'vehicle_keys' => $this->vehicle->keys->pluck('name'),
        ];
    }
}
