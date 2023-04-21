<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private const ERROR_MESSAGE = ['error' => 'Book not found'];

    public function getByParams(Request $request)
    {
        $query = Book::query();

        if ($request->has('id'))
            $query->where('id', $request->input('id'));
        
        if ($request->has('name'))
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        
        if ($request->has('author'))
            $query->where('author', 'LIKE', '%' . $request->input('author') . '%');

        if ($request->has('release_year'))
            $query->where('release_date', 'LIKE', $request->input('release_year') . '%');

        if ($request->has('price'))
            $query->where('price', $request->input('price'));
        
        $data = $query->get();

        return ($data->isEmpty())
            ? response(self::ERROR_MESSAGE, 404)
            : response()->json($data);
    }

    public function createBook(Request $request)
    {
        $book = new Book([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'image_url' => $request->input('image_url'),
            'release_date' => $request->input('release_date'),
            'price' => $request->input('price'),
        ]);

        $book->save();

        return response()->json($book, 201);
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);

        if (is_null($book))
            return response()->json(self::ERROR_MESSAGE, 404);

        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->image_url = $request->input('image_url');
        $book->release_date = $request->input('release_date');
        $book->price = $request->input('price');

        $book->save();

        return response()->json($book);
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);

        if (is_null($book))
            return response()->json(self::ERROR_MESSAGE, 404);

        $book->delete();

        return response()->noContent();
    }
}