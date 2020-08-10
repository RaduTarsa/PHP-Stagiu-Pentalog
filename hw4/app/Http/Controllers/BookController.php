<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        if($request->booked==null)
//        {
//            $books = \App\Book::orderBy('id')
//                ->join('authors', 'authors.id', '=', 'books.author_id')
//                ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
//                ->leftjoin('users', 'users.id', '=', 'books.booked_by')
//                ->select('books.id', 'books.title', 'authors.author_name',
//                    'publishers.publisher_name', 'books.publish_year',
//                    'books.booked', 'users.name',
//                    'books.created_at', 'books.updated_at')
//                ->get();
//        }
//        else
//        {
//            $books = \App\Book::orderBy('id')
//                ->join('authors', 'authors.id', '=', 'books.author_id')
//                ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
//                ->leftjoin('users', 'users.id', '=', 'books.booked_by')
//                ->select('books.id', 'books.title', 'authors.author_name',
//                    'publishers.publisher_name', 'books.publish_year',
//                    'books.booked', 'users.name',
//                    'books.created_at', 'books.updated_at')
//                ->where('booked', $request->query('booked'))
//                ->get();
//        }
        $books = \App\Book::orderBy('id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
            ->leftjoin('users', 'users.id', '=', 'books.booked_by')
            ->select('books.id', 'books.title', 'authors.author_name',
                'publishers.publisher_name', 'books.publish_year',
                'books.booked', 'users.name',
                'books.created_at', 'books.updated_at')
            ->where(function($books){
                if(request()->query('booked')<>null)
                    $books->where('booked', '=', request()->query('booked'));
            })
            ->get();

        return view('index', compact('books'));
    }

    public function create()
    {
        $authors = \App\Author::all();
        $publishers = \App\Publisher::all();

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

        $author_id = \App\Author::where('author_name', $author)->first()->id;
        $publisher_id = \App\Publisher::where('publisher_name', $publisher)->first()->id;

        $data = ['title' => $title, 'author_id' => $author_id,
            'publisher_id' => $publisher_id, 'publish_year' => $year];
        \App\Book::create($data);

        return redirect('/');
    }
    public function edit($book_id)
    {
        $book = \App\Book::findOrFail($book_id);
        $oldtitle = $book->title;
        $oldauthor = \App\Author::where('id', $book->author_id)->first()->author_name;
        $oldpublisher = \App\Publisher::where('id', $book->publisher_id)->first()->publisher_name;
        $oldyear = $book->publish_year;
        $olddata = [ 'book_id' => $book_id,
            'title' => $oldtitle, 'author' => $oldauthor,
            'publisher' => $oldpublisher, 'year' => $oldyear];

        $authors = \App\Author::get();
        $publishers = \App\Publisher::get();

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

        $author_id = \App\Author::where('author_name', $author)->first()->id;
        $publisher_id = \App\Publisher::where('publisher_name', $publisher)->first()->id;

        \App\Book::where('id', $request->input('id'))
            ->update(['title' => $title, 'author_id' => $author_id, 'publisher_id' => $publisher_id,
                'publish_year' => $year, 'updated_at' => NOW()]);

        return redirect('/');
    }
    public function delete($book_id)
    {
        \App\Book::where('id', $book_id)->delete();

        return redirect('/');
    }

    public function show($book_id)
    {
        $book = \App\Book::findOrFail($book_id);
        $author = \App\Author::find($book->author_id);
        $publisher = \App\Publisher::find($book->publisher_id);
        $user = \App\User::find($book->booked_by);

        return view('show', compact('book', 'author', 'publisher', 'user'));
    }

    public function book($book_id)
    {
        $is_booked = \App\Book::findOrFail($book_id)->booked;

        if($is_booked)
        {
            return redirect('/show-book/'. $book_id);
        }

        \App\Book::findOrFail($book_id)
            ->update(['booked' => 1, 'booked_by' => auth()->user()->id]);

        return redirect('/show-book/'. $book_id);
    }

    public function unbook($book_id)
    {
        \App\Book::findOrFail($book_id)
            ->update(['booked' => 0, 'booked_by' => null]);

        return redirect('/show-book/'. $book_id);
    }
}
