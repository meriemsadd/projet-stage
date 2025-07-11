<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $table='type_events';
    protected $fillable=['nom'];


    public function evenements()
{
    return $this->hasMany(Evenement::class,'type_events_id');
}

}

