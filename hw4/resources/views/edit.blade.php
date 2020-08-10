@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | Edit Book')

@section('body')

    <form action="/update-book" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{ $olddata['book_id'] }}"/>

        <h3><label for="title">Title</label></h3>
        <input type="text" id="title" name="book-title" value="{{ $olddata['title'] }}"/><br>

        <h3>Book Author:</h3>
        @if(count($authors)>0)
            <select name="book-author">
                @foreach($authors as $author)
                    <option value="{{ $author->author_name }}"
                    @if ($olddata['author']==$author->author_name)
                        selected="selected"
                    @endif
                    >{{ $author->author_name }}</option>
                @endforeach
            </select>
        @endif
        @empty($authors)
            <p>No authors.</p>
        @endempty
            <a href="/author/create-author">Add Authors</a>

        <h3>Book Publisher:</h3>
        @if(count($publishers)>0)
            <select name="book-publisher">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->publisher_name }}"
                    @if ($olddata['publisher']==$publisher->publisher_name)
                        selected="selected"
                    @endif
                    >{{ $publisher->publisher_name }}</option>
                @endforeach
            </select>
        @endif
        @empty($publishers)
            <p>No publishers.</p>
        @endempty
        <a href="/publisher/create-publisher">Add Publishers</a>

        <h3><label for="year">Publish year</label></h3>
        <input type="text" id="year" name="book-year" value="{{ $olddata['year'] }}"/><br><br>

        <input type="submit" value="Edit"/>
    </form>
    <p> @error('book-title') {{ $message }} @enderror </p>
    <p> @error('book-author') {{ $message }} @enderror </p>
    <p> @error('book-publisher') {{ $message }} @enderror </p>
    <p> @error('book-year') {{ $message }} @enderror </p>

    <br><hr><br>

    <a href="/">Go Back</a>

@endsection
