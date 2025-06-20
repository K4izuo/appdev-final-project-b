<?php

namespace App\Http\Controllers;

use App\Models\PetsData;
use Illuminate\Http\Request;

class PetsDataController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|email|max:255',
            'age' => 'required|integer|confirmed',
            'gender' => 'required|string|max:15',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'vaccinated' => 'required|string|max:255',
            'spayed' => 'required|string|max:255',
            'good_with_kids' => 'required|boolean|max:255',
            'good_with_pets' => 'required|boolean|max:255',
            'energy_level' => 'required|string|max:255',
            'photos' => 'required|string|max:255',
            
            // 'role' => ['required', 'string', Rule::in(PetsUser::ROLES)],
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $addPet = PetsData::create($fields);


        return [
            'addPet' => $addPet,

        ];
    }
}
