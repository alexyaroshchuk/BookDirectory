@extends('layouts.admin')
@section('content')
    @if(Auth::check())
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("authors.create") }}">
                Add Author
            </a>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            List authors
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $index => $author)
                        <tr>
                            <td>
                                {{ $author->id }}
                            </td>
                            <td>
                                {{ $author->first_name }}
                            </td>
                            <td>
                                {{ $author->last_name }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('authors.show', $author->id) }}">
                                    View
                                </a>
                                @if(Auth::check())
                                <a class="btn btn-xs btn-info" href="{{ route('authors.edit', $author->id) }}">
                                    Edit
                                </a>
                                <form method="POST" action="{{route('authors.destroy', $author->id) }}" style="display: inline-block;">
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
