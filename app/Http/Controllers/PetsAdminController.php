<?php

namespace App\Http\Controllers;

use App\Models\PetsAdmin;
use Illuminate\Http\Request;

class PetsAdminController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'department' => 'required|string|max:255',
            'employeeId' => 'required|string|max:255|unique:pets_admins',
            'email' => 'required|string|email|max:255|unique:pets_users',
            'password' => 'required|string|confirmed',
            // 'address' => 'required|string|max:255',
            // 'role' => ['required', 'string', Rule::in(PetsUser::ROLES)],
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $petAdmin = PetsAdmin::create($fields);

        $userToken = $petAdmin->createToken($petAdmin->email);

        return [
            'user' => $petAdmin,
            'token' => $userToken->plainTextToken
        ];
    }
}
