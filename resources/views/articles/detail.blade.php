@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $articles ->title }}
                </h5>
                <div class="card-subtitle mb2 text-mute small">
                    {{ $articles->created_at->diffForHumans() }}
                    Category: <b>{{ $articles->category->name }}</b>
                </div>
                <p class="card-text">{{ $articles->body }}</p>
                <a class="btn btn-warning" href="{{ url("/articles/delete/$articles->id")}}">Delete</a>
                
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">
                <b> Comments ({{count($articles->comments)}})</b>
            </li>
            <b>{{ session('error') }}</b>
            @foreach ($articles->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content}}
                    <a href="{{ url("/comments/delete/$comment->id")}}" class="close">
                        &times;
                    </a>
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name}}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>
        @auth
        <form action="{{ url("/comments/add")}}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $articles->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
        @endauth

    </div>
@endsection