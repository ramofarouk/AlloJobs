<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Operation extends JsonResource
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
            "montant" => $this->montant,
            "frais" => $this->frais,
            "identifier" => $this->identifier,
            "type_operation" => $this->type_operation,
            "reference" => $this->reference,
            "mode" => $this->mode,
            "numero" => $this->numero,
            "status" => $this->status
        ];
    }
}
