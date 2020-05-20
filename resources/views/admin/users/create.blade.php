@extends('layouts.admin')

@section('content')
    <h1>Creat Users</h1>
     {{-- {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
    {!! Form::close() !!} --}}

    
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>

        <div class="form-group">
            <label for="role_id">Role :</label>
            <select name="role_id" class="form-control" >
                <option selected>Choose One</option>

                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            
        </div> 


            

        <div class="form-group">
            <label for="is_active">Status :</label>
            <select class="form-control" name="is_active" id="is_active">
                <option value="1">Active</option>
                <option value="0" selected>Not Active</option>
            </select>
            {{-- <input type="text" name="in_active" class="form-control" placeholder="Status"> --}}
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>

        {{-- <div class="form-group">
            <label for="file">Add Picture :</label>
            <input type="file" name="file" class="" >
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        {{-- </div> --}} 

        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" class="form-control" placeholder="passwprd">
            {{-- @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif --}}
        </div>


         <div class="form-group">
            <button type="submit" class="btn btn-primary">Create User</button>
         </div>
    </form>
    @include('inc.message')
@endsection