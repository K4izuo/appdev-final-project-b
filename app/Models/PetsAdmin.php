<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class PetsAdmin extends Model
{

    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */

     protected $table = 'pets_admins';

    protected $fillable = [
      'firstName',
      'lastName',
      'email',
      'password',
      'phone',
      'department',
      'employeeId'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
