@extends('app')

@section('title', 'Tema 3 | Publisher')

@section('body')
    <a href="/">Go Back</a><br>
    <a href="/publisher/create-publisher">Add Publisher</a>

    <br><hr><br>

    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($publishers as $publisher)
            <tr>
                <td>{{ $publisher->id }}</td>
                <td>{{ $publisher->publisher_name }}</td>
                <td><a href="/publisher/edit-publisher/{{ $publisher->id }}">Editeaza</a></td>
                <td><a href="/publisher/delete-publisher/{{ $publisher->id }}">Sterge</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No publishers in database.</td>
            </tr>
        @endforelse
    </table>
@endsection
