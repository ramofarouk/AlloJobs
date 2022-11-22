<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            "prenoms" => $this->prenoms,
            "email" => ($this->email != null)?$this->email:"",
            "telephone" => ($this->telephone != null)?$this->telephone:"",
            "pseudo" => ($this->pseudo != null)?$this->pseudo:"",
            "ville" => ($this->ville != null)?$this->ville:"",
            "pays" => ($this->pays != null)?$this->pays:"",
            "token" => $this->token,
            "solde" => $this->solde,
            "sexe" => ($this->sexe != null)?$this->sexe:"",
            "password" => $this->password,
            "avatar" => $this->avatar,
            "status" => $this->status,
            "code" => ($this->code != null)?$this->code:"",
            "otp" => ($this->otp != null)?$this->otp:"",
        ];
    }
}
