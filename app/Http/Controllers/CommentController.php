<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::with(['post_id'])->get());
    }


    public function store(Request $request)
    {
        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'user_comment' => $request->user_comment,
        ]);

        return response()->json([
            'status' => (bool) $comment,
            'data'   => $comment,
            'message' => $comment ? 'Comment Created!' : 'Error Creating comment'
        ]);
    }

    public function show($id)
    {
        //$usercomment = User::where('id', $comment->user_id)->first();

        $comment =Comment::with('user')->where('post_id', $id)->get();
        //$usercomment = User::where('id', $comment->user_id)->first();

        $post =Post::where('id', $id)->first();
        $user = User::where('id', $post->user_id)->first();
        
        $koli = Comment::where('post_id', $id)->with('user')->orderBy('created_at', 'desc')->get();
        return response()->json(['comment'=>$koli]);


    }

    public function update(Request $request, Comment $commment)
    {
        $status = $comment->update(
            $request->only(['user_comment'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Updated!' : 'Error Updating Order'
        ]);
    }

    public function destroy(Order $order)
    {
        $status = $order->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Deleted!' : 'Error Deleting Order'
        ]);
    }
}
