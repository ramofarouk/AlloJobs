<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Offre extends JsonResource
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
            "id" => $this->id,
            "date_debut" => $this->date_debut,
            "description" => $this->description,
            "entreprise" => $this->entreprise,
            "job" => $this->job,
            "status" => $this->status,
        ];
    }
}
