@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | Publisher Edit')

@section('body')
    <form action="/publisher/update-publisher" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $olddata['publisher_id'] }}"/>

        <h3><label for="name">Publisher name</label></h3>
        <input type="text" id="name" name="publisher-name" value="{{ $olddata['publisher_name'] }}"/><br><br>

        <input type="submit" value="Edit"/>
    </form>
    <p> @error('publisher-name') {{ $message }} @enderror </p>

    <br><hr><br>

    <a href="/publisher">Go Back</a>
@endsection
