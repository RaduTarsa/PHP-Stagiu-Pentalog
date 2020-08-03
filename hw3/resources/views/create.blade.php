@extends('app')

@section('title', 'Tema 3 | Create Book')

@section('body')
    <form action="/store-book" method="POST" >
        @csrf

        <h3>Book Title:</h3>
        <input type="text" name="book-title" value="{{ old('book-title') }}">

        <h3>Book Author:</h3>
        @if(count($authors)>1)
            <select name="book-author">
                @foreach($authors as $author)
                    <option value="{{ $author->author_name }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
        @endif
        @empty($authors)
            <p>No authors.</p>
            <a href="/create-author">Add Authors</a>
        @endempty

        <h3>Book Publisher:</h3>
        @if(count($publishers)>1)
            <select name="book-publisher">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->publisher_name }}">{{ $publisher->publisher_name }}</option>
                @endforeach
            </select>
        @endif
        @empty($publishers)
            <p>No publishers.</p>
            <a href="/create-publisher">Add Publishers</a>
        @endempty

        <h3>Book Publish Year:</h3>
        <input type="number" name="book-year" value="{{ old('book-year') }}">
        <br><br>

        <input type="submit" value="Add Book">
    </form>
    <p> @error('book-title') {{ $message }} @enderror </p>
    <p> @error('book-author') {{ $message }} @enderror </p>
    <p> @error('book-publisher') {{ $message }} @enderror </p>
    <p> @error('book-year') {{ $message }} @enderror </p>

    <br><hr><br>
    <a href="/">Go Back</a>
@endsection
