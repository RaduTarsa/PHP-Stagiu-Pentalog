@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | Author Create')

@section('body')
    <form action="/author/store-author" method="POST">
        @csrf
        <h3>Author Name:</h3>
        <input type="text" name="author_name">
        <br><br>

        <input type="submit" value="Add Author">
    </form>
    <p> @error('author_name') {{ $message }} @enderror </p>

    <br><hr><br>
    <a href="/author">Go Back</a>
@endsection
