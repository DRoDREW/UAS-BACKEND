<?php
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< Updated upstream
        //
=======
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
>>>>>>> Stashed changes
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< Updated upstream
        //
=======
        return view('posts.create');
>>>>>>> Stashed changes
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< Updated upstream
        //
=======
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully.');
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
<<<<<<< Updated upstream
        //
=======
        return view('posts.show', compact('post'));
>>>>>>> Stashed changes
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
<<<<<<< Updated upstream
        //
=======
        return view('posts.edit', compact('post'));
>>>>>>> Stashed changes
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
<<<<<<< Updated upstream
        //
=======
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully.');
>>>>>>> Stashed changes
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
<<<<<<< Updated upstream
        //
    }
}
=======
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
>>>>>>> Stashed changes
