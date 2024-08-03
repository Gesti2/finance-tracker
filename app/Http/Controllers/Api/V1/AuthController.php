<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\RegisterRequest;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\Auth\AuthenticationInterface;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    private $authentication;

    public function __construct(AuthenticationInterface $authentication)
    {
        $this->authentication = $authentication;
    }
    public function register(RegisterRequest $request)
    {
        // $user = User::create($request->validated());

        // $token = $user->createToken('api');

        // return [
        //     'user' => $user,
        //     'token' => $token->plainTextToken
        // ];

        return $this->authentication->register($request->validated()); // returns null user cuz no middleware for its contoller
        // could add this to a variable and make a json response where i change the 'user' with $request
    }

    public function login(LoginRequest $request)
    {
        $fields = $request->validated();

        return $this->authentication->login($fields);

        // Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']]); // this if we were doing a web app


        // $user = User::where('email', $request->email)->first(); // where returns an array, so we grab the first one

        //     if (!$user || !Hash::check($request->password, $user->password)) {
        //         return [
        //             'message' => 'The provided credentials are incorrect.'
        //         ];
        //     }

        //     $token = $user->createToken($user->name);

        //     return [
        //         'user' => $user,
        //         'token' => $token->plainTextToken
        //     ];
    }

    public function logout()
    {
        // $request->user()->tokens()->delete(); // gets the token of the authenticated user and deletes it

        // return [
        //     'message' => 'Logged out'
        // ];

        $this->authentication->logout();

        // return response()->json(['message' => 'Logged out'], 204); // returned null
        return ['message' => 'Logged out'];
    }

    public function user()
    {
        return new UserResource($this->authentication->user());
    }
}
