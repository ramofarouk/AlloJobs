<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';

    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    protected $fillable = [
        'message','expediteur_id','destinataire_id','status'
    ];

    public function expediteur()
    {
        return $this->belongsTo('App\Models\User', 'expediteur_id');
    }

    public function destinataire()
    {
        return $this->belongsTo('App\Models\User', 'destinataire_id');
    }
}
