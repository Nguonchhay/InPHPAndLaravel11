<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserAPIController extends Controller
{
    public function login(Request $request)
    {

        $email = $request->get('email') ?? null;
        $password = $request->get('password') ?? null;
        if (empty($email) || empty($password)) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Email and password are required!'
            ]);
        }

        $queryUser = User::where('email', $email)->first();
        if (empty($queryUser)) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Use is not found!'
            ]);
        }

        if (!Hash::check($password, $queryUser->password)) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Use is not found!'
            ]);
        }

        $token = $queryUser->createToken($queryUser->email);

        $res = [
            'statusCode' => 200,
            'data' => [
                'token' => $token->plainTextToken
            ],
            'message' => 'Login is success'
        ];
        return response()->json($res);
    }
}
