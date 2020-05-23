@extends('layouts.admin');

@section('content')
    <h1>Post Page</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img class="img-rounded" height="50" width="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td><a href="{{route('posts.edit', $post->id)}}"> {{$post->title}}</a></td>
                        <td>{{$post->body}}</td>
                        {{-- <td><img class="img-rounded" height="50" width="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td> --}}
                        {{-- <td><a href="{{route('users.edit', $user->id)}}"> {{$user->name}} </a></td> --}}
                        {{-- <td>{{$user->email}}</td> --}}
                        {{-- <td>{{$user->role->name}}</td> --}}
                        {{-- <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td> --}}
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        {{-- <td>{{$post->created_at}}</td> --}}
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        {{-- <td>{{$post->updated_at}}</td> --}}
                    </tr>
                @endforeach
            @endif




        </tbody>
      </table>
@endsection
