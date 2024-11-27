<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function login(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }
    
            $user = User::where('email', $request->email)->first();
    
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => "Incorrect email or password"
                ], 400);
            }
    
            // Generate API token using Sanctum
            $token = $user->createToken('YourAppName')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ], 200);
    
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred during login', 'message'=> $e->getMessage()], 500);
        }
    }
    
    
   

    public function register(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'dob' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'accountType' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 400);
            }
    
            // Check if email is being used
            $isEmailTaken = User::where('email', $request->input('email'))->first();
    
            if ($isEmailTaken) {
                return response()->json([
                    'success' => false,
                    'message' => "This email is already taken"
                ], 400);
            }
    
            $validatedData = $validator->validated();
    
            // Hash the password before saving
            $createdUser = User::create([
                'name' => $validatedData["name"],
                'dob' => $validatedData["dob"],
                'email' => $validatedData["email"],
                'password' => Hash::make($validatedData["password"]), // Hash the password
                'accountType' => $validatedData["accountType"]
            ]);
    
            if (! $createdUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'There was an error registering your account'
                ]);
            }
    
            return response()->json([
                'success' => true,
                'data' => $createdUser
            ], 201);
    
        } catch (Exception $e) {
            return response()->json([
                'message' => "An error occurred during registration",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    
}
