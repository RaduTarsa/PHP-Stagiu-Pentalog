@extends('app')
@extends('layouts.app')

@section('title', 'Tema 3 | Index')

@section('body')
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <ul>
                @forelse($events as $event)
                    <li class="dropdown-item-text">{{ $event->title }} - {{ $event->author_name }} was {{ $event->action }}ed by {{ $event->name }}.</li>
                @empty
                    <p class="dropdown-item">No notifications.</p>
                @endforelse
            </ul>
        </div>
    </div>
    <hr>

    <a href="/create-book">Add Book</a><br>
    <a href="/author">Show Authors</a><br>
    <a href="/publisher">Show Publishers</a>
    <hr>
    <a href="/">All Books</a><br>
    <a href="?booked=1">Booked Books</a><br>
    <a href="?booked=0">Not Booked Books</a>

    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            <th>Booking Status</th>
            <th>Booked By</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td><a href="/show-book/{{ $book->id }}">{{ $book->title }}</a></td>
            <td>{{ $book->author_name }}</td>
            <td>{{ $book->publisher_name }}</td>
            <td>{{ $book->publish_year }}</td>
            @if($book->booked)
            <td>Booked</td>
            @else
            <td>Not Booked</td>
            @endif
            <td>{{ $book->name }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
            <td><a href="/edit-book/{{ $book->id }}">Editeaza</a></td>
            <td><a href="/delete-book/{{ $book->id }}">Sterge</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="11">No books in database.</td>
        </tr>
        @endforelse
    </table>
@endsection
