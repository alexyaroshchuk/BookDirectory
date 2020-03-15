@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit category
        </div>

        <div class="card-body">
            <form action="{{ route("authors.update", [$author->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="name">First name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($author) ? $author->first_name : '') }}">
                    @if($errors->has('first_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="name">Last name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($author) ? $author->last_name : '') }}">
                    @if($errors->has('last_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </em>
                    @endif
                </div>
                <div>
                    <a class="btn btn-xs btn-danger" href="{{route('authors')}}">
                        Back
                    </a>
                    <input class="btn btn-xs btn-success" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>

@endsection
