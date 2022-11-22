<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reservation extends JsonResource
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
            "cni_garant" => $this->cni_garant,
            "cni_souscripteur" => $this->cni_souscripteur,
            "certificat_residence" => $this->certificat_residence,
            "photo" => $this->photo,
            "produit" => $this->produit,
            "status" => $this->status,
        ];
    }
}
