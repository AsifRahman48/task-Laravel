<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('Todo_create');
    }


    public function store(Request $request)
    {
        $res=new Todo;
        $res->name=$request->input('name');
        $res->save();

        $request->session()->flash('msg','Data Submitted');
        return redirect( 'Todo_show');
    }


    public function show(Todo $todo)
    {
        return view('Todo_view')->with('todoArr',Todo::all());
    }


    public function edit($id)
    {
        return view('Todo_edit')->with('todoArr',Todo::find($id));
    }


    public function update(Request $request, $id)
    {


        $res=Todo::find($request->id);
        $res->name=$request->input('name');
        $res->save();

        $request->session()->flash('msg','Data updated');
        return redirect('Todo_show');
    }


    public function destroy(Todo $todo,$id)
    {
        Todo::destroy(array('id',$id));
        return redirect('Todo_show');
    }
}
