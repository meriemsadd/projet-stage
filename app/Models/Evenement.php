<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable=['titre', 'lieu' , 'date_de_début','date_de_fin', 'heure','user_id','type_events_id','description'];


    public function participants()
{
    return $this->hasMany(Participant::class);
}

   public function type()
{
     return $this->belongsTo(Type::class,'type_events_id');

}

   public function User()
   {
     
    return $this->belongsTo(User::class);

   }

}

