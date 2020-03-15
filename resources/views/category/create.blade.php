@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Category
        </div>

        <div class="card-body">
            <form action="{{ route("categories.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="name">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->title : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>


                <div>
                    <a class="btn btn-xs btn-danger" href="{{route('categories')}}">
                        Back
                    </a>
                    <input class="btn btn-xs btn-success" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

@endsection
