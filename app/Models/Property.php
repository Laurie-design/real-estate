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
        'image_path',
        'owner_name',
        'owner_phone',
        'owner_email',
        'floor_number',
        'furnished',
        'is_public',
        'total_floors',
        'surface',
        'type',
        'label'
    ];
}
