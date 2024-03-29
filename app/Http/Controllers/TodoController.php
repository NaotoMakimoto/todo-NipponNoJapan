<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Models\User;

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

    function level()
    {
        $todos = Todo::all();
        return view('posts.level', ['todos' => $todos]);
    }

    function showLevel()
    {
         // Todoモデルからポイントを取得する
    $todos = Todo::all(); // 仮の取得方法です。適切な方法に変更してください。
    $points = $todos->sum('points'); // Todoモデルのポイント属性に応じて変更してください。

    
        // ビューを返す
        return view('posts.level', compact('todos', 'points'));
    }

    
}
