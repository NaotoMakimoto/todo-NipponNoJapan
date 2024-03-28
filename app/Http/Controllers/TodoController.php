<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function index()
    {
        $todos = Todo::all();
        // dd($todos);
        return view('posts.index', ['todos'=>$todos]);
    }

    function show($id)
    {
        $todos = Todo::find($id);
        return view('posts.show', ['todos'=>$todos]);
    }
}
