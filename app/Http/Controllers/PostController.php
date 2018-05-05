<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//---------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    public function index()
    {
        //
        $post = Post::orderBy('title','desc')->paginate(10);
        // $user_id=auth()->user()->id;
        // $post = Post::where('user_id',$user_id)->paginate(2);
        return view('posts.index')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=> 'required',
            'body' => 'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);
        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get_filname Extension
                $fileNameWithExt= $request->file('cover_image')->getClientOriginalName();
            //Get just file name
                $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
                $extension=$request->file('cover_image')->getClientOriginalExtension();
            //File Name to sTore
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',  $fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
        //Create Post
        $post= new POST;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id !==$post->user->id){
            return redirect('/posts')->with('error', 'Unauthorized Action');
        };
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //Handle file upload
         if($request->hasFile('cover_image')){
            //Get_filname Extension
                $fileNameWithExt= $request->file('cover_image')->getClientOriginalName();
            //Get just file name
                $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
                $extension=$request->file('cover_image')->getClientOriginalExtension();
            //File Name to sTore
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',  $fileNameToStore);
        }
        $this->validate($request,[
            'title'=> 'required',
            'body' => 'required',
        ]);

        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(auth()->user()->$id!==$post->user_id){
            return redirect('/post')->with('error', 'Unauthorized Page');
        }

        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
