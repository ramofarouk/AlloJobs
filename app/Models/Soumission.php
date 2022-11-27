<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soumission extends Model
{
    use HasFactory;
    protected $table = 'soumissions';


    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    protected $fillable = [
        'reference','cv','entreprise_id','demandeur_id','status'
    ];

    public function demandeur()
    {
        return $this->belongsTo('App\Models\User', 'demandeur_id');
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Models\User', 'entreprise_id');
    }
    public function offre()
    {
        return $this->belongsTo('App\Models\Offre', 'entreprise_id');
    }
}
