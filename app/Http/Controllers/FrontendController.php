<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Auth;

class FrontendController extends Controller
{
    public function index(){
        //header post
        $posts = Post::orderBy('created_at','DESC')->take(5)->get();
        $firstPost = $posts->splice(0,2);
        $secondPost = $posts->splice(0,1);
        $lastPost = $posts->splice(0);
        //footer posts
        $footerPost = Post::inRandomOrder()->take(4)->get();
        $firstFooter = $footerPost->splice(0,1);
        $secondFooter = $footerPost->splice(0,2);
        $lastFooter = $footerPost->splice(0,1);
        //all recent post
        $recentPosts = Post::orderBy('created_at','DESC')->paginate(9);

        $user = auth::User();
        $data = compact('user','posts','recentPosts','firstPost','secondPost','lastPost','firstFooter','secondFooter','lastFooter');
        return view('website.index')->with($data);
    }

    public function about(){
        return view('website.contact');
    }
    public function category($slug){
        $category = Category::where('slug',$slug)->first();

        if($category){
            $posts = Post::where('category_id',$category->id)->paginate(9);
            return view('website.category',compact('category','posts'));
        }else{
            return redirect()->route('website');
        }

    }

    public function post($slug){
        $post = Post::all()->where('slug',$slug)->first();
        $populerPost = Post::inRandomOrder()->limit(3)->get();

        //Related post
        $relatedPost = Post::orderBy('category_id','DESC')->inRandomOrder()->take(4)->get();
        $firstPost = $relatedPost->splice(0,1);
        $secondPost = $relatedPost->splice(0,1);
        $lastPost = $relatedPost->splice(0,2);

        $category = Category::all();
        $tags = Tag::all();
        if($post){
            return view('website.post',compact('post','populerPost','category','tags','relatedPost','firstPost','secondPost','lastPost'));
        }else{
            return redirect('/');
        }

    }
}
