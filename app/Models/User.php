<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ajouter le champ rôle ici
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function owners() : HasMany {
        return $this->hasMany(Owner::class);
    }

    public function categories() : HasMany {
        return $this->hasMany(Categorie::class);
    }

    public function demandes() : HasMany {
        return $this->hasMany(Demande::class);
    }
}
