@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | '. $book->title)

@section('body')
    <a href="/">Go Back</a>

    <br><hr><br>

    <div>
        <strong><p>Title</p></strong>
        <p>{{ $book->title }}</p>
    </div>
    <div>
        <strong><p>Author</p></strong>
        <p>{{ $author->author_name }}</p>
    </div>
    <div>
        <strong><p>Publisher</p></strong>
        <p>{{ $publisher->publisher_name }}</p>
    </div>
    <div>
        <strong><p>Publish Year</p></strong>
        <p>{{ $book->publish_year }}</p>
    </div>
    <div>
        <strong><p>Book Status</p></strong>
        @if($book->booked)
            @if($book->booked_by==auth()->user()->id)
                <p>Booked by you</p>
                <div>
                    <a href="/unbook-book/{{ $book->id }}">Unbook</a>
                </div>
            @else
                <p>Booked by {{ $user->name }}</p>
            @endif
        @else($book->booked)
        <p>Not Booked</p>
        <div>
            <a href="/book-book/{{ $book->id }}">Book</a>
        </div>
        @endif
    </div>
@endsection
