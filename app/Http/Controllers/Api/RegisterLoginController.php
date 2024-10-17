<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterLoginController extends Controller
{
    public function storeUser(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'contactNo' => 'required|digits:10',
            'password' => 'required|string|min:6',
        ]);


        // If validation fails, return an error response using Utils::errorResponse
        if ($validator->fails()) {
            return Utils::errorResponse(
                'Validation failed',
                $validator->errors(),
                422 // HTTP 422 Unprocessable Entity
            );
        }

        // Create a new user instance and fill the fields
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->contactNo = $request->contactNo;
        $user->password = $request->password; // Hash the password
        $user->status = "Active";

        // Save the user and return a success response using Utils::sendResponse
        if ($user->save()) {
            return Utils::sendResponse(
                $user,
                'User Created Successfully'
            );
        }

        // If saving the user fails, return an error response using Utils::errorResponse
        return Utils::errorResponse(
            'Failed to create user',
            [],
            500 // HTTP 500 Internal Server Error
        );
    }
}