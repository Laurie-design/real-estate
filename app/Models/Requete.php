<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    use HasFactory;

    protected $fillable = [
        'surfaceMaximale',
         'prixMaximal',
         'address',
    ];

    public function user(){
        return $this->BelongsTo(\App\Models\User::class);
    }
}
