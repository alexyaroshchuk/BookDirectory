@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Book
        </div>

        <div class="card-body">
            <form action="{{ route("books.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="name">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($book) ? $book->title : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                    <label for="name">Photo</label>
                    <input type="file" id="file" name="file" class="form-control" value="{{ old('file', isset($book) ? $book->photo : '') }}">
                    @if($errors->has('photo'))
                        <em class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </em>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Categories</label>
                    <select class="form-control selectpicker" name="category_id[]" id="category_id" multiple>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Authors</label>
                    <select class="form-control selectpicker" name="author_id[]"  id="author_id" multiple>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->first_name . ' ' . $author->last_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <a class="btn btn-xs btn-danger" href="{{route('books')}}">
                        Back
                    </a>
                    <input class="btn btn-xs btn-success" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <!-------- head -------->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <!-------- end head -------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <!-------- end of the body -------->

    <script>

        $(document).ready(function() { //
            $('.selectpicker').selectpicker();
        });
    </script>
@endsection
