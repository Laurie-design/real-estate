<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateHeure',
        'nb_chambres',
        'type_bien',
        'details',
    ];

    public function user(){
        return $this->BelongsTo(\App\Models\User::class);
    }
}
