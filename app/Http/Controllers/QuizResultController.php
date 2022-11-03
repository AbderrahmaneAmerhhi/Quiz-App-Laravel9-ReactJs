<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use App\Http\Requests\StoreQuizResultRequest;
use App\Http\Requests\UpdateQuizResultRequest;

class QuizResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreQuizResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizResultRequest $request)
    {
        //
        QuizResult::create($request->except('_token'));

        return response()->json('Result Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizResult  $quizResult
     * @return \Illuminate\Http\Response
     */
    public function show(QuizResult $quizResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizResult  $quizResult
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizResult $quizResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizResultRequest  $request
     * @param  \App\Models\QuizResult  $quizResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizResultRequest $request, QuizResult $quizResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizResult  $quizResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizResult $quizResult)
    {
        //
    }
}
