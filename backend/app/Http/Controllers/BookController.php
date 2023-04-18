<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function getAllBooks()
    {
        $data = Book::all();
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = Book::find($id);

        return (is_null($data))
            ? response("", 404)
            : response()->json($data);
    }
}
