<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index(Author $author)
    {
        $authors = $author->all();
        return view('admin.author.index', compact('authors'));
    }

    public function create(Request $request, Author $author)
    {
        return view('admin.author.create');
    }

    public function store(Request $request, Author $author)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'passwd' => 'required',
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        $data = [
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('passwd')),
        ];

        if ($request->hasFile('avatar')) {
            $image = $this->Upload($request->file('avatar'));
        }

        $author->create(array_merge($data, ['avatar' => $image]));

        return redirect()->back()->with(['success' => 'Success']);

    }

    public function show(Author $author)
    {
        //
    }

    public function edit(Author $author, $id)
    {
        // $author = $author->all()->where('id', $id);
        $author = $author->findOrFail($id);
        $books = $author->Book()->get()->pluck('name', 'id');
        return view('admin.author.edit', compact('author', 'books'));
    }

    public function update(Request $request, Author $author, $id)
    {
        $author = $author->findOrFail($id);

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'passwd' => 'required',
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        $data = [
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('passwd')),
        ];

        if ($request->hasFile('avatar')) {
            $image = $this->Upload($request->file('avatar'));
        }

        $author->update(array_merge($data, ['avatar' => $image]));

        return redirect()->back()->with(['success' => 'Success']);

    }

    public function destroy(Author $author, $id)
    {
        $author = $author->findOrFail($id);
        $author->delete();
    }

    private function Upload($file)
    {
        $ext = $file->getClientOriginalExtension();
        $imagename = time() . '.' . $ext;
        $path = storage_path('/app/public');
        $file->move($path, $imagename);
        return $imagename;
    }
}
