<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title,'_'),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);
        $post->tags()->attach($request->tags);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filname = time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/post',$filname);
            $post->image = $filname;
        }
        $post->save();
        Session::flash('success','Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validation
        $this->validate($request,[
            'title' => "required|unique:posts,title,$post->id",
            'description' => 'required',
            'category' => 'required',
        ]);
        $post->title = $request->title;
        $post->description = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;

        $post->tags()->sync($request->tags);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filname = time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/post',$filname);
            $post->image = $filname;
        }
        $post->save();
        Session::flash('success','Post update successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            //image exists
            $image_path = public_path('storage/post/'.$post->image);
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $post->delete();
        }
        Session::flash('success','Post deleted successfully');
        return redirect()->back();
    }
}
