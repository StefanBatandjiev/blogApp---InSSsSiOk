@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>Author: {{$post->author->name}}</p>
                        <h1 class="h2 mt-4">{{$post->title}}</h1>
                        <hr>
                        <p class="mt-4">{{$post->body}}</p>
                        <hr>
                        <h2 class="h4 mt-4">Comment Section</h2>
                        <hr>
                        @foreach ($comments as $comment)
                            <x-comment :comment="$comment"/>
                        @endforeach
                        @if (Auth::id() != null)
                            <div class="mt-4">
                                <form method="post" action='{{ url("/comments") }}' class="d-flex flex-column">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                    <label for="body">Comment</label>
                                    <input type="text" name="body" class="form-control">
                                    <button type="submit" class="btn btn-primary mt-2">Post</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
