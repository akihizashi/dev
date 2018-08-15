<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class PostsController extends Controller
{
    public function indexAdmin()
    {
      $posts = Post::paginate(15);
      return view('/admin.posts.index', compact('posts'));
    }

    public function createAdmin()
    {
      return view('/admin.posts.create');
    }

    public function store()
    {
      $this->validate(request(), [
          'title' => 'required|max:255',
          'image' => 'image|nullable|max:1999'
      ]);

      if(request()->hasFile('image')){
        $fileNameWithExt = request()->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = request()->file('image')->storeAs('public/images', $fileNameToStore);
      } else {
        $fileNameToStore = 'NoImage.jpg';
      }

      Post::create([
          'user_id' => auth()->id(),
          'title' => request('title'),
          'body' => request('body'),
          'image' => $fileNameToStore

      ]);

      return redirect('/admin/posts')->with('status', 'New post created');
    }

    public function edit($id)
    {
      $post = Post::find($id);
      return view('admin/posts/edit', compact('post'));
    }

    public function update($id){

      $this->validate(request(), [
          'title' => 'required|max:255',
          'image' => 'image|nullable|max:1999'
      ]);

      if(request()->hasFile('image')){
        $fileNameWithExt = request()->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = request()->file('image')->storeAs('public/images', $fileNameToStore);
      }

      $post = Post::find($id);
      $post->title = request('title');
      $post->body = request('body');
      if(request()->hasFile('image')){
        $post->image = $fileNameToStore;
      }
      $post->save();

      return redirect('/admin/posts')->with('status', 'Post updated');
    }

    public function delete()
    {
      Post::where('id', '=', request('post_id'))->delete();
      return back()->with('status', 'Post deleted');
    }

//Front Controllers
    public function index()
    {
      $posts = Post::paginate(5);
      return view('/posts.index', compact('posts'));
    }

    public function show($id)
    {
      $post = Post::find($id);
      return view('/posts.show', compact('post'));
    }
}
