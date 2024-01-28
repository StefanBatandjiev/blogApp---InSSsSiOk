<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        // Retrieve a listing of comments
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    public function create()
    {
        // Show the form for creating a new comment
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->on_post = $request->input('post_id');
        $comment->from_user = Auth::id();
        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->route('post-show', ['slug' => $request->input('post_slug')]);
    }

    public function show(string $id)
    {
        // Display the specified comment
        $comment = Comment::findOrFail($id);
        return view('comments.show', ['comment' => $comment]);
    }

    public function edit(string $id)
    {
        // Show the form for editing the specified comment
        $comment = Comment::findOrFail($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, string $id)
    {
        // Update the specified comment in storage
        $comment = Comment::findOrFail($id);
        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->route('comments.show', ['id' => $id]);
    }

    public function destroy(string $id)
    {
        // Remove the specified comment from storage
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index');
    }
}
