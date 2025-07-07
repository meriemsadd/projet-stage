<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable=['nom','prenom','profession','evenement_id'];
    
    public function evenement()
{
    return $this->belongsTo(Evenement::class);
}

}
