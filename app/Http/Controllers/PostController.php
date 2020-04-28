<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Auth;


class PostController extends Controller
{
    public function index()
        {
            //$comment =Comment::with('user')->where('post_id', $id)->get();

            $post = Post::all();
            foreach($post as $row){
               $comments = $row->comments->count();
            }
            $price = Post::withCount('comments')->with('user')->orderBy('created_at', 'desc')->paginate(15);
            //$post = Post;
            return response()->json(['posts'=>$price]);
        }

        public function store(Request $request)
        {
            $post = Post::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'details' => $request->details,
                'image' => $request->image ]);

            return response()->json([
                'status' => (bool) $post,
                'data'   => $post,
                'message' => $post ? 'Post Created!' : 'Error Creating Post'
            ]);
        }

        public function show(Post $post)
        {
           // $post =Post::where('id', $id)->get();
            $user = User::where('id', $post->user_id)->first();
            return response()->json(['post' => $post,
            'user' => $user]); 
        }

        public function uploadFile(Request $request)
        {
            if($request->hasFile('image')){
                $name = time()."_".$request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images'), $name);
            }
            return response()->json(asset("images/$name"),201);
        }

        public function update(Request $request, $id)
        {
            $status = Post::findOrFail($id);
            $status->update(
                $request->only(['title', 'details', 'image'])
            );

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Product Updated!' : 'Error Updating Product'
            ]);
        }

       public function getSearchResults(Request $request)
         {

            $data = $request->get('data');
            $possts = Post::withCount('comments')->where('title', 'like', "%{$data}%")
            ->orwhere('details', 'like', "%{$data}%")->with('user')
            ->get();

            return response()->json(['posts' => $possts]);
         }

        public function destroy(Post $post)
        {
            $status = $post->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Product Deleted!' : 'Error Deleting Product'
            ]);
        }
}
