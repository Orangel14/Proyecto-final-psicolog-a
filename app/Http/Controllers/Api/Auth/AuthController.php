<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login(Request $request): JsonResponse
  {
    $this->validate($request, [
      "email" => "required|email",
      "password" => "required"
    ]);

    if (auth()->validate(['email' => $request->email, 'password' => $request->password])) {
      $user = User::where('email', $request->email)->first();
      $access = $user->createToken('token')->plainTextToken;
      return response()->json([
        ...$user->toArray(),
        'access' => $access
      ]);
    }

    return response()->json([
      'message' => 'Invalid credentials',
      'errors' => [
        'email' => ['Invalid credentials'],
      ]
    ], 401);
  }

  public function register(Request $request): JsonResponse
  {
    $this->validate($request, [
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8|max:32|confirmed',
      'last_name' => 'required',
      'first_name' => 'required',
    ]);

    $hashedPassword = Hash::make($request->password);
    $user = User::create(array_merge($request->all(), [
      'password' => $hashedPassword
    ]));

    return response()->json([
      'message' => 'User register successfully',
      'user' => $user
    ]);
  }
}
