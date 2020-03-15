@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show category: {{ $author->first_name . $author->last_name}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Book id</th>
                    <th>Book title</th>
                </tr>
                </thead>
                <tbody>
                @foreach($author->books()->get() as $index => $book)
                    <tr>
                        <td>
                            {{ $book->id }}
                        </td>
                        <td>
                            {{ $book->title }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <a class="btn btn-xs btn-danger" href="{{route('authors')}}">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection
