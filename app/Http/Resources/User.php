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
            "prenoms" => ($this->prenoms != null)?$this->prenoms:"",
            "email" => ($this->email != null)?$this->email:"",
            "telephone" => ($this->telephone != null)?$this->telephone:"",
            "pseudo" => ($this->pseudo != null)?$this->pseudo:"",
            "ville" => ($this->ville != null)?$this->ville:"",
            "quartier" => ($this->quartier != null)?$this->quartier:"",
            "date_debut" => ($this->date_debut != null)?$this->date_debut:"",
            "pays" => ($this->pays != null)?$this->pays:"",
            "token" => $this->token,
            "type_user" => $this->type_user,
            "cv" => $this->cv,
            "description" => $this->description,
            "activite" => $this->activite,
            "last_diplome" => $this->last_diplome,
            "last_experience" => $this->last_experience,
            "job" => $this->job,
            "password" => $this->password,
            "avatar" => $this->avatar,
            "status" => $this->status
        ];
    }
}
