<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dash.users.index')->with([
            'users'=>User::all(),
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
        return view('dash.users.add')->with([
            'groupes'=>Group::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'name'=>'required|max:15',
            'adress'=>'nullable|min:6',
            'email'=>'required',
            'password'=>'required|min:5',
            'group_id'=>'nullable',
            'role'=>'required',
        ]);
        User::create($request->except('_token'));

        return redirect()->route('users.create')->with([
            'success'=>"User Account  Added successfully "
        ]);
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
        $user = User::where('id',$id)->first();
        return view('dash.users.show')->with([
            'user'=>$user,
            'quizeres'=>QuizResult::where('user_id',$id)->get(),
        ]);
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
        $user = User::where('id',$id)->first();
        return view('dash.users.edit')->with([
            'user'=>$user,
            'groupes'=>Group::all(),
        ]);
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
        $user = User::findOrFail($id);

        if($request->password == null){
            $request->password = $user->password;
        }

        // $user->update($request->except('_token'));
        $user->update([
            "name" => $request->name,
            "adress" => $request->adress,
            "email" =>  $request->email,
            "password" =>  $request->password,
            "role" =>  $request->role,
            "group_id" => $request->group_id,

        ]);

        return redirect()->route('users.index')->with([
            'success'=>"User Updated successfully "
        ]);
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with([
            'success'=>"User Deleted successfully "
        ]);
    }
}
