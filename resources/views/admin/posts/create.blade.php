@extends('layouts.admin');

@section('content')
    <h1> create Post Page</h1>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>

        <div class="form-group">
            <label for="category_id">Category :</label>
            <select name="category_id" class="form-control" >
                <option value="0" selected>Choose One</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>


        <div class="form-group">
            <label for="photo_id">Add Picture :</label>
            <input type="file" name="photo_id" class="" >
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>

        <div class="form-group">
            <label for="body">Description :</label>
            <textarea name="body" id="" class="form-control" cols="" rows="" placeholder="Add your text here"></textarea>
            {{-- <input type="password" name="password" class="form-control" placeholder="passwprd"> --}}
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>


         <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
         </div>
    </form>
    @include('inc.message')

@endsection
