<?php

namespace App;

use App\Presence;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $guarded = ['id'];

    /**
     * Accesseur pour la propriété "presence"
     * @return string
     */
    public function getPresenceAttribute() : string
    {
    	return $this
    		->belongsTo(Presence::class, 'presence_id')
    		->first()
    		->presence;
    }

    /**
     * Accesseur pour la propriété "nom_complet"
     * @return string
     */
    public function getNomCompletAttribute() : string
    {
    	return $this->prenom . " " . $this->nom;
    }
}
