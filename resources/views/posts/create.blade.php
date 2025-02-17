@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1>Crear Post</h1>
            <div class=" mb-2">     
                <a href="{{ route('posts.index') }}" class="mb-3 text-shadow-pop-right">Todos Posts</a>        
            </div>
              
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group m-1 p-3 {{ session('success') ? 'alert-success' : '' }}">
                    @if (session('success'))
                        <span class="label label-success">{{ session('success') }}</span>
                    @endif
                </div>

                <div class="form-group m-1 p-3 {{ $errors->any() ? 'alert-danger' : '' }}">
                    @error('title')
                        <span class="label label-danger">{{ $message }}</span>
                    @enderror
                    @error('body')
                        <span class="label label-danger">{{ $message }}</span>
                    @enderror
                    @error('image')
                        <span class="label label-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo"
                        value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="body">Informacion</label>
                    <textarea name="body" class="form-control" id="body" placeholder="Datos" rows="8" required>{{ old('body') }}</textarea>
                </div>

                <div class="custom-file mb-3">
                    <label class="custom-file-label" for="image">Elija archivo...</label>
                    <input type="file" name="image" class="custom-file-input" id="image" required>
                </div>

                <button type="submit" class="btn btn-primary block">Crear Posts</button>
            </form>
        </div>
    </div>

@endsection
