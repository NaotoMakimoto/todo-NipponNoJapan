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

    function level()
    {
        $todos = Todo::all();
        return view('posts.level', ['todos' => $todos]);
    }

    function getPoints()
    {
        // ここでポイントを取得するロジックを実装する
        $points = Todo::sum('value'); // 仮の例：ポイントの合計を取得

        return response()->json(['points' => $points]);
    }

}
