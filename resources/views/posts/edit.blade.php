@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action='{{ url("posts/update") }}'>
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">{{ __('Content') }}</label>
                                <textarea class="form-control" id="body" rows="5" name="body">{{$post->body}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
