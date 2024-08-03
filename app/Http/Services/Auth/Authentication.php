<?php

namespace App\Http\Services\Auth;

use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;


class Authentication implements AuthenticationInterface
{
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function check()
    {
        return $this->guard()->check();
    }

    public function user()
    {
        return $this->guard()->user();
    }

    public function register(array $fields)
    {
        try {
            $user = $this->userRepository->create(
                Arr::only($fields, ['name', 'email', 'password'])
            );

            $token = $user->createToken('api');

            dd($this->respondWithToken($token));
            return $this->respondWithToken($token);
            //
        } catch (Exception $e) {
            Log::error('Authentication::register Exception Error: ' . $e->getMessage());

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function login(array $fields)
    {
        try {
            $user = $this->userRepository->findBy('email', $fields['email']);

            if (!$user || !Hash::check($fields['password'], $user->password)) {
                return [
                    'message' => 'The provided credentials are incorrect.'
                ];
            }

            $token = $user->createToken('api');

            return $this->respondWithToken($token);
        } catch (Exception $e) {
            Log::error('Authentication::Login Exception Error: ' . $e->getMessage());

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function logout()
    {
        if ($this->check()) {
            $this->user()->tokens()->delete();
        }
    }


    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $this->user()
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
