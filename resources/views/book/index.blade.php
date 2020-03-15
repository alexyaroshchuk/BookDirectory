@extends('layouts.admin')
@section('content')
    @if(Auth::check())
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("books.create") }}">
                Add Book
            </a>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            List categories
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $index => $book)
                        <tr>
                            <td>
                                {{ $book->id }}
                            </td>
                            <td>
                                {{ $book->title }}
                            </td>
                            <td>
                                @if(isset($book->photo))
                                    <img src = "{{ asset('storage/images/' . $book->photo) }}" height="60" weight="120" />
                                @endif
                            </td>

                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('books.show', $book->id) }}">
                                        View
                                    </a>
                                    @if(Auth::check())
                                        <a class="btn btn-xs btn-info" href="{{ route('books.edit', $book->id) }}">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{route('books.destroy', $book->id) }}" style="display: inline-block;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-xs btn-danger delete-user" value="Delete">
                                            </div>
                                        </form>
                                    @endif
                                </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $('.delete-user').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection
@endsection
