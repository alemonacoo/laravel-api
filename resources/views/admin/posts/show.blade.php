@extends('layouts.dashboard')

@section('content')
     <h5>{{$post->title}}</h3>
     <p>{{$post->content}}</p>
     <button>
     <a href="{{route('admin.posts.edit', $post)}}">Modifica</a>
     </button>
     <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input onclick="confirm('Are you sure?')" type="submit" value="Cancella">
     </form>
@endsection