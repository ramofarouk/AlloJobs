<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Produit extends JsonResource
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
            "nom" => $this->nom,
            "reference" => $this->reference,
            "description" => $this->description,
            "accompte" => $this->accompte,
            "journalier" => $this->journalier,
            "duree" => $this->duree,
            "photo" => $this->photo,
            "status" => $this->status,
        ];
    }
}
