@extends('layouts.admin')
@section('content')
    @if(Auth::check())
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("categories.create") }}">
                    Add Category
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('categories.show', $category->id) }}">
                                    View
                                </a>
                                @if(Auth::check())
                                <a class="btn btn-xs btn-info" href="{{ route('categories.edit', $category->id) }}">
                                    Edit
                                </a>
                                <form method="POST" action="{{route('categories.destroy', $category->id) }}" style="display: inline-block;">
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
        $(document).ready(function() {
            $("#myModalBox").modal('show');
        });
    </script>
@endsection
@endsection
