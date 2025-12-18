<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AdminResource;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        // dd($request->validated());
        $admin = User::create($request->validated());

        return $this->sendSuccess(['admin' => new AdminResource($admin)], 'admin created successfully');

    }

    public function login(LoginRequest $request)
    {
        $user = User::where('username', '=', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->sendError('email or password are not correct', 402);
        }
        $user->token = $user->createToken("token")->plainTextToken;

        return $this->sendSuccess(new AdminResource($user), 'Logged in successfully');
    }

    public function logout(Request $request)
    {
        /** @var App/Model */
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return $this->sendSuccess(null, 'logged out successfully');
    }
}
