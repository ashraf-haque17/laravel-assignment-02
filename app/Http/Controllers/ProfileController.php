<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function index($id)
    {
        // Declare variables as per the question
        $name = "Donald Trump";
        $age = "75";

        // Store the data in an associative array
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age,
        ];

        // Set the cookie variables
        $cookieName = 'access_token';
        $cookieValue = '123-XYZ';
        $minutes = 1; // Lifetime in minutes
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false; // Not using HTTPS
        $httpOnly = true; // HttpOnly flag

        // Create the cookie
        $cookie = cookie(
            $cookieName,
            $cookieValue,
            $minutes,
            $path,
            $domain,
            $secure,
            $httpOnly
        );

        // Return the response with data and cookie
        return response()->json($data, 200)->cookie($cookie);
    }
}

