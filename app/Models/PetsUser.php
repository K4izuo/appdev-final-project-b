<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PetsUser extends Authenticatable
{
    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    
    protected $table = 'pets_users';
    
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'password',
      'phone_number',
      'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public const ROLES = ['admin', 'moderator', 'user'];

}
