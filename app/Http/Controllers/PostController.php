<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
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
        //
      // return "It's working.The number is ".$id;
      // $posts = Post::all();

      // $posts = Post::latest()->get(); //get last item to insert to first order
      // $posts = Post::orderBy('id','asc')->get(); //get first item to insert to first order
      $posts = Post::latest(); //call function scopeLatest in Post
      return view('posts.index',compact('posts'));
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
    public function store(CreatePostRequest $request)
    {
      //validate
      // $this->validate($request,[
      //   'title'=>'required'
      // ]);
        //
        // return $request->all();
        // Post::create($request->all());
        // $input = $request->all();
        // $input['title'] = $request->title;

        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();
        //
        // return redirect('/post');

        //get data of file function
        // $file = $request->file('file');
        // echo "<br />";
        // echo $file->getClientOriginalName();
        // echo "<br />";
        // echo $file->getClientSize();
        // echo "<br />";
        $input = $request->all();
        if ($file = $request->file('file')) {
          $name = $file->getClientOriginalName();
          $file->move('images',$name);
          $input['path']=$name;//file <--name of column

        }
        Post::create($input);
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
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
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
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));

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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('post');
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
        $post = Post::where('id', $id)->delete();
        return redirect('post');

    }
    public function contact(){
      $people = ['Edwin','Jose'];
      return view('contact',compact('people'));
    }
    public function show_post($id,$name,$password){
      // return view('post')->with('id', $id);
      return view('post',compact('id','name','password'));
    }
}
