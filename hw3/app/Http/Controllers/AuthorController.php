<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')->orderBy('id')->get();

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $request->validate(['author-name' => 'required']);
        $name = $request->input("author-name");

        DB::table('authors')->insert(['author_name' => $name]);

        return redirect('/author');
    }

    public function edit($author_id)
    {
        $author = DB::table('authors')->where('id', $author_id)->first()->author_name;
        $olddata = ['author_id' => $author_id, 'author_name' => $author];

        return view('author.edit', compact('olddata'));
    }

    public function update(Request $request)
    {
        $request->validate(['author-name' => 'required']);

        $name = $request->input("author-name");

        DB::table('authors')
            ->where('id', $request->input('id'))
            ->update(['author_name' => $name]);

        return redirect('/author');
    }

    public function delete($author_id)
    {
        DB::table('authors')->where('id', $author_id)->delete();
        DB::table('books')->where('author_id', $author_id)->delete();

        return redirect('/author');
    }
}
