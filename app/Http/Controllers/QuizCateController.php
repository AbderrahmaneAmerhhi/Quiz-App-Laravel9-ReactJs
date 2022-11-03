<?php

namespace App\Http\Controllers;

use App\Models\QuizCate;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreQuizCateRequest;
use App\Http\Requests\UpdateQuizCateRequest;

class QuizCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if( Route::currentRouteName()== 'cats.index'){
            return view('dash.quizcats.index')->with([
                'cats'=>QuizCate::all(),
            ]);
        }else{

             return response()->json(QuizCate::all());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dash.quizcats.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizCateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizCateRequest $request)
    {
        //


        QuizCate::create($request->except('_token'));

        return redirect()->route('cats.create')->with([
            'success'=>"Quiz category Added successfully "
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizCate  $quizCate
     * @return \Illuminate\Http\Response
     */
    public function show(QuizCate $quizCate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizCate  $quizCate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate = QuizCate::findOrFail($id);
        return view('dash.quizcats.edit')->with([
            'cate' => $cate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizCateRequest  $request
     * @param  \App\Models\QuizCate  $quizCate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizCateRequest $request,$id)
    {
        //
        $cate = QuizCate::findOrFail($id);
        $cate->update($request->except('_token'));

        return redirect()->route('cats.index')->with([
            'success'=>"Quiz category Updated successfully "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizCate  $quizCate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cate = QuizCate::findOrFail($id);
        $cate->delete();
        return redirect()->route('cats.index')->with([
            'success'=>"Quiz category Deleted successfully "
        ]);
    }
}
