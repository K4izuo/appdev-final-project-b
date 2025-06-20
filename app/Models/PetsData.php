<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetsData extends Model
{
    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'gender',
        'size',
        'color',
        'description',
        'location',
        'vaccinated',
        'spayed',
        'good_with_kids',
        'good_with_pets',
        'energy_level',
        'photos',
        ];
}
