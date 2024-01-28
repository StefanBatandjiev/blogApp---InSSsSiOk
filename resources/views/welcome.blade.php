<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="antialiased">
<div class="container mt-5">
    @if (Route::has('login'))
        <div class="text-end">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary ms-2">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="container mt-5">
    <h2>Latest Posts</h2>

    <div class="row">
        @foreach ($posts as $post)
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="border p-3">
                            <h2 class="text-2xl mb-4">{{ $post->title }}</h2>
                            <div class="font-bold mb-2">Author: {{ $post->author->name }}</div>
                            <div class="text-lg"><i class="fa-solid fa-location-dot"></i> {{ $post->created_at }}</div>
                            @if ($post->author->id == Auth::id())
                                <a href="/posts/edit/{{ $post->slug }}" class="btn btn-primary mt-3">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
