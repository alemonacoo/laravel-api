@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.store')}}" method="POST">
    @csrf
    <div>
        <label for="title">Titolo:</label>
        <input type="text" required minlength="5" maxlength="255" name="title" value="{{old('title', ' ')}}">
    </div>
    <div>
        <label for="content">Contenuto:</label>
        <textarea name="content" required maxlength="255" cols="30" rows="10" value="{{old('content', ' ')}}"></textarea>
    </div>
    <div>
        <label for="category_id">Categoria:</label>
        <select name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }} {{$category->id == old('category_id', -1) ? 'selected' : ''}}">
                {{ $category->name }}
            </option>    
            @endforeach
         </select>
        </div>
    <input type="submit" value="Crea">

    </form>
@endsection