<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'address',
        'owner_id',
        // 'floor_number',
        'furnished',
        'is_public',
        'total_floors',
        'surface',
        'categorie_id',
        'image_path',
        'image1_path',
        'image2_path',
        'user_id',
    ];

    public function owner() {
        return $this->belongsTo(Owner::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }
}
