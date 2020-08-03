@extends('app')

@section('title', 'Tema 3 | Index')

@section('body')
    <a href="/create-book">Add Book</a><br>
    <a href="/author">Show Authors</a><br>
    <a href="/publisher">Show Publishers</a>

    <br><hr><br>

    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author_name }}</td>
            <td>{{ $book->publisher_name }}</td>
            <td>{{ $book->publish_year }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
            <td><a href="/edit-book/{{ $book->id }}">Editeaza</a></td>
            <td><a href="/delete-book/{{ $book->id }}">Sterge</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No books in database.</td>
        </tr>
        @endforelse
    </table>
@endsection
