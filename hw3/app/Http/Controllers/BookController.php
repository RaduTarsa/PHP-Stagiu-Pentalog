<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->orderBy('id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
            ->select('books.id', 'books.title', 'authors.author_name',
            'publishers.publisher_name', 'books.publish_year',
            'books.created_at', 'books.updated_at')
            ->get();

        return view('index', compact('books'));
    }

    public function create()
    {
        $authors = DB::table('authors')->get();
        $publishers = DB::table('publishers')->get();

        return view('create', compact('authors', 'publishers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'book-title' => 'required', 'book-author' => 'required',
            'book-publisher' => 'required', 'book-year' => 'required']);

        $title = $request->input("book-title");
        $author = $request->input("book-author");
        $publisher = $request->input("book-publisher");
        $year = $request->input("book-year");

        $author_id = DB::table('authors')->where('author_name', $author)->first()->id;
        $publisher_id = DB::table('publishers')->where('publisher_name', $publisher)->first()->id;

        DB::table('books')->insert([
           'title' => $title, 'author_id' => $author_id,
           'publisher_id' => $publisher_id, 'publish_year' => $year,
            'created_at' => NOW(), 'updated_at' => null
        ]);

        return redirect('/');
    }
    public function edit($book_id)
    {
        $book = DB::table('books')->where('id', $book_id)->first();
        $oldtitle = $book->title;
        $oldauthor = DB::table('authors')->where('id', $book->author_id)->first()->author_name;
        $oldpublisher = DB::table('publishers')->where('id', $book->publisher_id)->first()->publisher_name;
        $oldyear = $book->publish_year;
        $olddata = [ 'book_id' => $book_id,
            'title' => $oldtitle, 'author' => $oldauthor,
            'publisher' => $oldpublisher, 'year' => $oldyear];

        $authors = DB::table('authors')->get();
        $publishers = DB::table('publishers')->get();

        return view('edit', compact('olddata', 'authors', 'publishers'));
    }
    public function update(Request $request)
    {
        $request->validate([ 'id' => 'required',
            'book-title' => 'required', 'book-author' => 'required',
            'book-publisher' => 'required', 'book-year' => 'required']);

        $title = $request->input("book-title");
        $author = $request->input("book-author");
        $publisher = $request->input("book-publisher");
        $year = $request->input("book-year");

        $author_id = DB::table('authors')->where('author_name', $author)->first()->id;
        $publisher_id = DB::table('publishers')->where('publisher_name', $publisher)->first()->id;

        DB::table('books')
            ->where('id', $request->input('id'))
            ->update(['title' => $title, 'author_id' => $author_id, 'publisher_id' => $publisher_id,
                'publish_year' => $year, 'updated_at' => NOW()]);

        return redirect('/');
    }
    public function delete($book_id)
    {
        DB::table('books')->where('id', $book_id)->delete();

        return redirect('/');
    }
}
