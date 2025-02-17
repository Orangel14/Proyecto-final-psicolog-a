@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <br>
                        <h3 class="mt-4">{{ $post->title }}
                            <span class="lead"> Por
                                <a href="#"> {{ $post->user->full_name }} </a>
                            </span>
                        </h3>
                        <hr>
                        <p>Posteado {{ $post->created_at->diffForHumans() }} </p>
                        <hr>
                        <img class="img-fluid rounded" src=" {!! !empty($post->image) ? '/uploads/posts/' . $post->image : 'http://placehold.it/750x300' !!} " alt="">
                        <hr>
                        <div>
                            <p>{{ $post->body }} </p>
                            <hr>
                            <br>
                        </div>
                    </div>
                </div>
                @auth
                    <div class="card my-4">
                        <h5 class="card-header">Deja un comentario:</h5>
                        <div class="card-body">
                            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea name="body" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @foreach ($post->comments as $comment)
                    <div class="card-footer">
                        <strong>{{ $comment->user->full_name }} </strong>
                        <span class="text-muted"> {{ $comment->created_at->diffForHumans() }} </span>
                        <p> {{ $comment->body }} </p>
                    </div>
                @endforeach
                @if ($post->comments->count() == 0)
                    <center>
                        <p>No hay comentarios disponibles aun</p>
                    </center>
                @endif
            @endsection
