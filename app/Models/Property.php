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
        'floor_number',
        'furnished',
        'is_public',
        'total_floors',
        'surface',
        'type',
        // 'label',
        'image_path',
        'image1_path',
        'image2_path',
    ];

    public function owner() {
        return $this->belongsTo(Owner::class);
    }
}
