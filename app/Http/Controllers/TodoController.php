<?php

namespace App\Http\Controllers;

use App\Todo;
use Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Auth::user()->todos()->orderBy('priority', 'desc')->orderBy('created_at','desc')->get();
        return view('todo.index', ["todos" => $todos]);
        // dd($todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create');
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
        $validator = Validator::make($request->all(), Todo::$rules, Todo::$messages);
        if($validator->fails()){
          return back()->with(['errors'=>$validator->messages()]);
        }
        // dd($request->all());
        Auth::user()->todos()->create($request->all());
        return redirect()->action('TodoController@index')->with(['status' => 'Success', 'info' => 'Todo Create Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        // $todo = Auth::user()->todos->all();
        // dd($todo);
        return view('todo.show', ["todo" => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view('todo.edit', ["todo" => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $validator = Validator::make($request->all(), Todo::$rules, Todo::$messages);
        if($validator->fails()){
          return back()->with(['errors'=>$validator->messages()]);
        }
        // dd($request->all());
        Todo::findOrFail($todo)->first()->update($request->all());
        return redirect()->action('TodoController@index')->with(['status' => 'Success', 'info' => 'Todo Update Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return back()->with(['status' => 'Success', 'info' => 'Todo Delete Success']);
    }

    public function toggle(Todo $todo){
        $todo->status = $todo->status ? 0 : 1;
        $todo->save();
        return back()->with(['status' => 'Success', 'info' => 'Todo Mark Success']);
    }

}
