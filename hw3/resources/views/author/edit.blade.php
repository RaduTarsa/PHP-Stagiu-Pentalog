@extends('app')

@section('title', 'Tema 3 | Author Edit')

@section('body')
    <form action="/author/update-author" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $olddata['author_id'] }}"/>

        <h3><label for="name">Author name</label></h3>
        <input type="text" id="name" name="author-name" value="{{ $olddata['author_name'] }}"/><br><br>

        <input type="submit" value="Edit"/>
    </form>
    <p> @error('author-name') {{ $message }} @enderror </p>

    <br><hr><br>

    <a href="/author">Go Back</a>
@endsection
