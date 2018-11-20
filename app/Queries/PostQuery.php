<?php 
namespace App\Queries;
use App\Post;
class PostQuery{
	
    public static function get($category, $postSlug=null){
    	if($postSlug){
	        return static::single($postSlug);
        }
        return static::category($category);
    }

    protected static function single($slug){

    	$post = Post::whereSlug($slug)->with('tags')->first();
        abort_if(!$post, 404);
        $post->recordVisit();
        $nextPost =  Post::where('id', '>', $post->id)->orderBy('id','asc')->first();
        $prevPost =  Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        return view('single', [
        	'post' => $post, 
        	'next' => $nextPost,
        	'prev' => $prevPost
        ]);
    }

    protected static function category($category){
    	return view('category', [
            'name' => $category->name, 
            'posts' => $category->posts,
            'tags' => \App\Tag::all()
        ]);
    }
}