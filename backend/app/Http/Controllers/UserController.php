<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $data = User::all();

        return response()->json($data);
    }
}
