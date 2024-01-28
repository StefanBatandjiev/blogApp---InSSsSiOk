@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('My posts') }}</div>

                        <div class="card-body">
                            @if($posts->isEmpty())
                                <p>No posts available.</p>
                            @else
                                <div class="row">
                                    @foreach ($posts as $post)
                                        <div class="col-md-4 mb-4">
                                            <x-blog-post-card :post="$post"/>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
