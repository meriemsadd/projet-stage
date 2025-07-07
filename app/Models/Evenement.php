<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable=['titre', 'lieu' , 'date' , 'heure' , 'Categorie'];


    public function participants()
{
    return $this->hasMany(Participant::class);
}

}

