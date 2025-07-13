<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    protected $fillable=['nom'];

    public function participants(){
         
        return $this->hasMany(Participant::class);
    }
}

