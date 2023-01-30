@extends('layouts.admin')

@section('content')
    <h1>{{$category->name}}</h1>
    {{-- Con il punto interrogativo prima del nome della proprietà si intende 'se esiste stampa se no non farlo' --}}
    <h3>{{$post->category?->name ?: 'Nessuna Categoria'}}</h3>
    <p>{{$post->content}}</p>
    <div>
        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning my-1 d-inline-block">Modifica</a>
        <a href="#" class="btn btn-danger my-1">Elimina</a>
    </div>
    <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-1">Torna alla Lista</a>
@endsection