@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
     {{-- {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
    {!! Form::close() !!} --}}

   



    
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>
    
        <div class="col-sm-9">
    
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                    @method('PATCH')
                <div class="form-group">
                    <label for="name">Name :</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                    {{-- @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif --}}
                </div>
        
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                    {{-- @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif --}}
                </div>
        
                <div class="form-group">
                    <label for="role_id">Role :</label>
                    <select name="role_id" class="form-control" >
                        {{-- <option selected>{{$user->role->name}}</option> --}}
        
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div> 
        
                <div class="form-group">
                    <label for="is_active">Status :</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
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
                    <label for="password">Password :</label>
                    <input type="password" name="password" class="form-control" placeholder="passwprd">
                    {{-- @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif --}}
                </div>
        
        
                 <div class="form-group float-left">
                    <button type="submit" class="btn btn-primary">Update User</button>
                 </div>
                </form>
                
                {{-- Delete Button --}}
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
    
                    <div class="form-group float-right">
                        <div class="form-group">
                        <button type="submit" class="btn btn-danger">Delete User</button>
                     </div>
                </form>
                {{-- ////////////// --}}
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('inc.message')
            </div>
    
        </div>
@endsection