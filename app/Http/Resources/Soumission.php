<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Soumission extends JsonResource
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
            "reference" => $this->reference,
            "cv" => $this->cv,
            "entreprise" => $this->entreprise,
            "demandeur" => $this->demandeur,
            "status" => $this->status,
        ];
    }
}
