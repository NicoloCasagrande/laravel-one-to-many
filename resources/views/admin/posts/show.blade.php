@extends('layouts.admin')

@section('content')
    <h1>{{$post->title}}</h1>
    {{-- Con il punto interrogativo prima del nome della proprietà si intende 'se esiste stampa se no non farlo' --}}
    <a href="{{route('admin.categories.show', $post->category)}}"><h3>{{$post->category?->name ?: 'Nessuna Categoria'}}</h3></a>
    <p>{{$post->content}}</p>
    <div>
        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning my-1 d-inline-block">Modifica</a>
        <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
    <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-1">Torna alla Lista</a>
@endsection