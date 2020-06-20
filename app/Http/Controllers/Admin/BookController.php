<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $authors = Author::all()->pluck('firstname', 'id');
        return view('admin.book.create', compact('authors'));
    }

    public function store(Request $request, Book $book)
    {

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'pages' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'pages' => $request->input('pages'),
        ];

        $book->create($data);

        return redirect()->back()->with(['success' => 'Success']);

    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book, $id)
    {
        $book = $book->findOrFail($id);
        $authors = Author::all()->pluck('firstname', 'id');
        return view('admin.book.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book, $id)
    {
        $book = $book->find($id);

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'pages' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'pages' => $request->input('pages'),
        ];

        $book->update($data);

        return redirect()->back()->with(['success' => 'Success']);

    }


    public function destroy(Book $book, $id)
    {
        $book = $book->findOrFail($id);
        $book->delete();
        return redirect()->back();
    }
}
