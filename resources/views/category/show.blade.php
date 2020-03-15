@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show category: {{ $category->title }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Book Id</th>
                    <th>Book Title</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category->books()->get() as $index => $book)
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
                <a class="btn btn-xs btn-danger" href="{{route('categories')}}">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection
