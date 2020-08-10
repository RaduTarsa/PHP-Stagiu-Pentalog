<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = \App\Author::orderBy('id')->get();

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['author_name' => 'required']);
        \App\Author::create($data);

        return redirect('/author');
    }

    public function edit($author_id)
    {
        $author = \App\Author::findOrFail($author_id)->author_name;
        $olddata = ['author_id' => $author_id, 'author_name' => $author];

        return view('author.edit', compact('olddata'));
    }

    public function update(Request $request)
    {
        $request->validate(['author-name' => 'required']);

        $name = $request->input("author-name");

        \App\Author::where('id', $request->input('id'))
            ->update(['author_name' => $name]);

        return redirect('/author');
    }

    public function delete($author_id)
    {
        \App\Book::where('author_id', $author_id)->delete();
        \App\Author::where('id', $author_id)->delete();

        return redirect('/author');
    }
}
