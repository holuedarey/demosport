<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gametypes;

class AdminGameTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $gametype = Gametypes::all();

        $no = 1;

        return view('admingametype', compact('no', 'gametype'));
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

          $post = new Gametypes([
            'name' => $request->input('name'),
            'wining_price' => $request->input('wining_price'),
            'entry_price' => $request->input('entry_price'),
            'questions_count' => $request->input('questions_count'),
            'image' => (url('/') . '/posts/'.$fileName)
                    ]);
        $post->save();

        return redirect('/admin/gametype');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gametype = Gametypes::find($id);
        $gametype->delete();

        return redirect('/admin/gametype');
    }
}
