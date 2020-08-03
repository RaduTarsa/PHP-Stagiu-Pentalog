@extends('app')

@section('title', 'Tema 3 | Author')

@section('body')
    <a href="/">Go Back</a><br>
    <a href="/author/create-author">Add Author</a>

    <br><hr><br>

    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->author_name }}</td>
                <td><a href="/author/edit-author/{{ $author->id }}">Editeaza</a></td>
                <td><a href="/author/delete-author/{{ $author->id }}">Sterge</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No authors in database.</td>
            </tr>
        @endforelse
    </table>
@endsection
