<?php

namespace App\Models;//cette classe existe dans model

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable=['nom','prenom','email','profession','evenement_id'];//fillable pour la securité ila mandirhach maykhlinich ndkhl l had les tableau
    
    public function evenement()
{
    return $this->belongsTo(Evenement::class);
    //cett fonction pour chaque participant kayntami l wahd event
}

}
