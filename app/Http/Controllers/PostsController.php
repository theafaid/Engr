<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePostForm;
use App\Queries\PostQuery;
use App\Category;
use App\Post;
use App\Tag;
use Storage;

class PostsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        $tags = Tag::orderBy('id', 'desc')->get();

        if(count($categories)){
            return view('admin.posts.create', [
                'categories' => $categories,
                'tags' => $tags
            ]);
        }

        if(auth()->user()->admin){    
            session()->flash('error', "Your Haven't Create Any Category Yet!");
            return redirect(route('categories.index'));
        }else{
            session()->flash('error', "Sorry! Admin Must Create Any Category Before You Can Create Your Post");
            return redirect(route('home'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
      */
    public function store(StorePostForm $form, Post $post)
    {
        $image = null ;
        if(request()->hasFile('image')){
            $image = $post->uploadImage('image');
        }

        $post = Post::create([
            'title' => request('title'),
            'body'  => request('body'),
            'slug' => request('title'),
            'category_id' =>  Category::whereSlug(request('category'))->firstOrFail()->id,
            'user_id' =>  auth()->id(),
            'image' => $image,
        ]);
        $post->tags()->attach(request('tags'));
        session()->flash('success', 'Post Created Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $postSlug = null)
    {
        return PostQuery::get($category, $postSlug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id;
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post, 
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|string|max:255', 
            'body' => 'required|string|max:20000',
            'category' => 'required|string|exists:categories,slug',
            'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'tags'  => 'min:1|array|exists:tags,id'
        ]);

        $image = null;
        if(request()->hasFile('image')){
            $image = $post->uploadImage('image', 'update');
        }

        Post::whereSlug($post->slug)->update([
            'title' => request('title'),
            'body'  => request('body'),
            'slug' => request('title'),
            'category_id' =>  Category::whereSlug(request('category'))->firstOrFail()->id,
            'image' => $image,
        ]);
        Post::find($post->id)->tags()->sync(request('tags'));
        session()->flash('success', 'Post Updated Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post was trashed successfully!.');
        return redirect(route('posts.index'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trashed(){
        $trashed =  Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('trashed'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($slug){
        $post = Post::onlyTrashed()->whereSlug($slug)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post Restored Successfully');
        return back();
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kill($slug){
        $post = Post::onlyTrashed()->whereSlug($slug)->firstOrFail();
        Storage::has($post->image) ? Storage::delete($post->image) : '';
        $post->tags()->detach($post->tags);
        $post->forceDelete();
        session()->flash('success', 'Post was permanently deleted !');
        return back();
    }
}
