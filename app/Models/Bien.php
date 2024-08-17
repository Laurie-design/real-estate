<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'type',
        'prix',
        'description',
        'nbr_chambre',
        'nbr_etage',
         'num_etage',
        'meuble',
        'superficie',
        'libelle',
        'imgs',
        'is_public',

    ];

    public function demandes() :BelongsToMany {
        return $this->belongsToMany(\App\Models\Demande::class);
    }

    public function user() :BelongsToMany {
        return $this->belongsToMany(\App\Models\Demande::class);
    }

}
