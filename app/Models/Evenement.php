<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    protected $fillable = [
        'titre', 
        'lieu',
        'date_de_début',
        'date_de_fin', 
        'heure',
        'user_id',
        'type_events_id',
        'description',
        'image' // Ajoutez ceci si vous gérez des images
    ];

    // Relation avec les participants
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    // Relation avec le type d'événement
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_events_id');
    }

    // Relation avec l'utilisateur créateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Ajoutez ces accesseurs si besoin
    public function getDateDebutFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->date_de_début)->format('d/m/Y');
    }

    public function getDateFinFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->date_de_fin)->format('d/m/Y');
    }
}