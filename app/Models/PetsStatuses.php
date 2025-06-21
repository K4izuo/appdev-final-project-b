<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetsStatuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function pets()
    {
        return $this->hasMany(PetsData::class, 'status_id', 'id');
    }
}
