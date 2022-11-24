<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
   use HasFactory;
   protected $table = 'offres';


    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    protected $fillable = [

        'status','description','job','date_debut','user_id'
    ];

    public function entreprise()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
