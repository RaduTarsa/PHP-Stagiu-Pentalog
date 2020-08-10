@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | Publisher Create')

@section('body')
    <form action="/publisher/store-publisher" method="POST">
        @csrf
        <h3>Publisher Name:</h3>
        <input type="text" name="publisher_name">
        <br><br>

        <input type="submit" value="Add Publisher">
    </form>
    <p> @error('publisher_name') {{ $message }} @enderror </p>

    <br><hr><br>
    <a href="/publisher">Go Back</a>
@endsection
