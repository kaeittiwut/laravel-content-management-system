<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();

        /* Make users see only their own posts. */
        $posts = auth()->user()->posts;

        /* Make users see only their own posts with Paginate. */
        // $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Policy that determine whether the user can create models. */
        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Policy that determine whether the user can create models. */
        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required|min:4|max:255',
            'post_image' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        /* Create the Owner of post with current User. */
        auth()->user()->posts()->create($inputs);

        session()->flash('created-message', $inputs['title']);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Post::findOrFail($id);

        return view('blog-post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        /* Policy that determine whether the user can view the model. */
        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        /* Policy that determine whether the user can update the model. */
        $this->authorize('update', $post);

        $inputs = request()->validate([
            'title' => 'required|min:4|max:255',
            'post_image' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        /* Update the Owner of post with current User. */
        // auth()->user()->posts()->save($post);

        /* Update only field that has changed.*/
        $post->save();

        session()->flash('updated-message', $inputs['title']);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /* Policy that determine whether the user can delete the model. */
        $this->authorize('delete', $post);

        $post->delete();

        session()->flash('deleted-message', $post->title);

        return back();
    }
}
