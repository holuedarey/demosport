<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Comment;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function login(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('token')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }

    public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('token')->accessToken,
            ]);
        }

        public function show(User $user)
        {
            return response()->json($user);
        }

        public function showComments(User $user)
        {
            $comment =Comment::where('user_id', $user->id)->get();

            return response()->json(['comments' => $comment ]);

            //return response()->json($user->comments()->with(['product'])->get());
        }

        public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['name', 'email',  'password' => Hash::make($request['password'])]);

            return response()->json([
                'message' => 'Fine Updating User','user'=> $user
            ]);
        }

}
