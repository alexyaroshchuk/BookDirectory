@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show book: {{ $book->title }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Categories</th>
                    <th>Authors</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            {{ $book->id }}
                        </td>
                        <td>
                            {{ $book->title }}
                        </td>
                        <td>
                            @if(isset($book->photo))
                                <img src="{{ asset('storage/images/'.$book->photo) }}"   height="240" weight="48    0"  alt="" title="">
                            @endif
                        </td>
                        <td>
                            @foreach($book->categories()->get() as $index => $category)
                                {{ $category->title }} <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($book->authors()->get() as $index => $author)
                                {{ $author->first_name . $author->last_name}}<br>
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a class="btn btn-xs btn-danger" href="{{route('books')}}">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection
