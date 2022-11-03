<?php

namespace App\Http\Controllers;

use App\Models\establishment;
use App\Http\Requests\StoreestablishmentRequest;
use App\Http\Requests\UpdateestablishmentRequest;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dash.establishments.index')->with([
            'establishments'=>establishment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dash.establishments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreestablishmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreestablishmentRequest $request)
    {
        //
        establishment::create($request->except('_token'));

        return redirect()->route('establishment.create')->with([
            'success'=>"establishment  Added successfully "
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function show(establishment $establishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $establishment = establishment::findOrFail($id);
        return view('dash.establishments.edit')->with([
            'establishment' => $establishment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateestablishmentRequest  $request
     * @param  \App\Models\establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateestablishmentRequest $request,$id)
    {
        //
        $establishment = establishment::findOrFail($id);
        $establishment->update($request->except('_token'));

        return redirect()->route('establishment.index')->with([
            'success'=>"Establishment Updated successfully "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $establishment = establishment::findOrFail($id);
        $establishment->delete();
        return redirect()->route('establishment.index')->with([
            'success'=>"Establishment Deleted successfully "
        ]);
    }
}
