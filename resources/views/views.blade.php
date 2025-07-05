<?php $user = Auth::user(); ?>





@extends('layouts.default')
@section("title", "Views")
@section("content")








    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <h3 class="card-header text-center">Create Post</h3>
                        <div class="card-body">
                            <form action="{{ route('views.show') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="titolo" placeholder="Inserisci il titolo">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"
                                        placeholder="Contenuto" name="contenuto"></textarea>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                                </div>
                                <div class="mt-3">
                                    <p>Torna alla pagina <a href="{{ route('home') }}">home</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <h3 class="mb-2 mt-4">Post Recenti</h3>

            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{ $post->titolo }}</h4>
                        <div
                            style="min-height:100px !important; height: auto; display: flex; flex-direction: column; justify-content: center;">
                            <pre style=" display: inline-block;">{{ $post->contenuto }}</pre>
                        </div>
                        <p><strong>Autore:</strong> {{ $post->user->name ?? 'Sconosciuto' }}</p>
                        <small><em>Creato il {{ $post->created_at->format('d/m/Y H:i') }}</em></small>
                        <br>
                        <div class="mt-3"></div>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="">
                                <button type="submit" class="btn btn-danger btn-block">Elimina Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>







@endsection