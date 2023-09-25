<?php

namespace App\Http\Resources;

use App\Enums\CarStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'brand' => $this->brand,
            'registration_no' => $this->registration_no,
            'img_url' => asset($this->img_url),
            'status' => CarStatus::getKey($this->status),
            'details' => $this->details,
            'rental_rate' => $this->rental_rate,
            'door_count' => $this->properties['door_count'],
            'fuel_type' => $this->properties['fuel_type'],
            'seat_count' => $this->properties['seat_count'],
            'gear_box_type' => $this->properties['gear_box_type'],
        ];
    }
}
