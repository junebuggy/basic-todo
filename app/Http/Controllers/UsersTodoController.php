<?php

namespace App\Http\Controllers;

use App\UsersTodo;
use Illuminate\Http\Request;

class UsersTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersTodos = UsersTodo::all();
        return view('usertodo', compact('usersTodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usertodoform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'todo_name' => 'required|max:255',
            'todo_desc' => 'required|max:255',
            'todo_time' => 'required',
            'todo_date' => 'required|date',
        ]);
        
        $usersTodo = new UsersTodo();
        
        $usersTodo->task = $request->todo_name;
        $usersTodo->task_description = $request->todo_desc;
        $usersTodo->scheduled_time = $request->todo_time;
        $usersTodo->scheduled_date = $request->todo_date;
        
        $usersTodo->save();
        
        return redirect('/userstodos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersTodo  $usersTodo
     * @return \Illuminate\Http\Response
     */
    public function show(UsersTodo $usersTodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersTodo  $usersTodo
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersTodo $userstodo)
    {
        //$usersTodos = UsersTodo::find($userstodo->id);
        return view('usertodoeditform', compact('userstodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersTodo  $usersTodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersTodo $userstodo)
    {
        $request->validate([
            'todo_name' => 'required|max:255',
            'todo_desc' => 'required|max:255',
            'todo_time' => 'required',
            'todo_date' => 'required|date',
        ]);
        
        $userstodo->task = $request->todo_name;
        $userstodo->task_description = $request->todo_desc;
        $userstodo->scheduled_time = $request->todo_time;
        $userstodo->scheduled_date = $request->todo_date;
        
        $userstodo->save();
        
        return redirect('/userstodos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersTodo  $usersTodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersTodo $userstodo)
    {
        $userstodo->delete();
        return redirect('/userstodos'); 
        
    }
}
