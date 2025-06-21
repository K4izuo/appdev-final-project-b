<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetsData extends Model
{

    protected $table = 'pets_data';

    protected $fillable = [
      'name',
      'species',
      'breed',
      'age',
      'gender',
      'size',
      'color',
      'description',
      'image',
      'status',
      'location',
      'dateAdded',
      'vaccinated',
      'spayed',
      // 'good_with_kids',
      // 'good_with_pets',
      // 'energy_level',
      // 'photos',
    ];

    public function gender()
    {
        return $this->belongsTo(PetsGender::class, 'gender_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(PetsSizes::class, 'size_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(PetsStatuses::class, 'status_id', 'id');
    }
}
