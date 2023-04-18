<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function test()
    {
        $data = [
            'name' => 'Some Random Book',
            'publication_year' => 2002,
            'price' => 59.99
        ];

        return response()->json($data);
    }
}
