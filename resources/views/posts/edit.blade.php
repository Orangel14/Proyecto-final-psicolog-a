@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1>Editar Post</h1>
            <div class=" mb-2">     
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary">Atras</a>        
            </div>
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Tutilo</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="body">Informacion</label>
                    <textarea name="body" class="form-control" id="body" rows="8" required>{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
