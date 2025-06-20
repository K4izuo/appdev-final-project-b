<?php

namespace App\Http\Controllers;

use App\Models\PetsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rule;

class PetsUserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pets_users',
            'password' => 'required|string|confirmed',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            // 'role' => ['required', 'string', Rule::in(PetsUser::ROLES)],
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $petsUser = PetsUser::create($fields);

        $userToken = $petsUser->createToken($petsUser->email);

        return [
            'petsUser' => $petsUser,
            'token' => $userToken->plainTextToken
        ];
    }

    public function login(Request $request)
    {
      $request->validate([
          'email' => 'required|email|exists:pets_users',
          'password' => 'required',
          // 'role' => ['required', 'string', Rule::in(PetsUser::ROLES)],
      ]);

      $users = PetsUser::where('email', $request->email)->first();

      if (!$users || !Hash::check($request->password, $users->password)) {
        return response()->json([
            'message' => 'The provided credentials are incorrect.'
        ], 401);
      }

      $userToken = $users->createToken($users->email);

      return [
          'user' => $users,
          'token' => $userToken->plainTextToken
      ];
    }

    public function logout(Request $request)
    {
      $request->user()->currentAccessToken()->delete();

      return response()->json(['message' => 'Logged out successfully']);
    }
}
