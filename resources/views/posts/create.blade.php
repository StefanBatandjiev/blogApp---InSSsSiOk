@extends('layouts.app')

@section('content')>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/posts">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">{{ __('Content') }}</label>
                                <textarea class="form-control" id="body" rows="5" name="body"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Post') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
