<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use Auth;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $user = User::orderBy('created_at', 'desc')->get();

        //numbering results
        $no = 1;

        return view('adminposts', compact('no', 'posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $name =$request->file('file');
            $filename = $name->getClientOriginalName();
            $extension = $name->getClientOriginalExtension();
            $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
            $name->move(public_path() . '/posts', $fileName);
        }
    

        $post = new Post([
            'user_id' =>  Auth::id(),
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'image' => (url('/') . '/posts/'.$fileName)
                    ]);
        $post->save();

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('id', $id)->get();
        $no = 1;
        return view('adminposts', compact('no', 'posts'));
  
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
        $post = Post::find($id);
        $post->update($request->only(['title', 'details', 'image']));

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/admin/posts');
    
    }
}
