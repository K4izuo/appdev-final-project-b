<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetsGender extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function pets()
    {
        return $this->hasMany(PetsData::class, 'gender_id', 'id');
    }
}
