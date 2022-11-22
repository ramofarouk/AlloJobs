<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointRecharge extends JsonResource
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
            "id" => $this->id,
            "nom" => $this->nom,
            "latitude" => ($this->latitude != null)?$this->latitude:"",
            "longitude" => ($this->longitude != null)?$this->longitude:"",
            "status" => $this->status
        ];
    }
}
