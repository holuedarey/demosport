<?php

namespace App\Http\Controllers;
use App\Questions;

use Illuminate\Http\Request;

class AdminQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Questions::all();

        //numbering results
        $no = 1;

        return view('adminquestions', compact('no', 'questions'));
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
        
        $post = new Questions([
            'question' => $request->input('question'),
            'optiona' => $request->input('optiona'),
            'optionb' => $request->input('optionb'),
            'optionc' => $request->input('optionc'),
            'optiond' => $request->input('optiond'),
            'answer' => $request->input('answer'),
                    ]);
        $post->save();

        return redirect('/admin/questions');
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
         $question = Questions::find($id);
        $question->delete();

        return redirect('/admin/questions');
    }
}
