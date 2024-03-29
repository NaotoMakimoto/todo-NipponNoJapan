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

    public function showLevel()
    {
        // ポイントを取得するための適切なロジックを実装する
        $points = 0; // 仮のポイント数。実際のデータベースからポイントを取得するロジックをここに追加する
        
        // Todo モデルからデータを取得する例
        $todos = Todo::all(); // 仮の取得方法。適切なロジックに置き換える
        
        // ビューを返す
        return view('posts.level', compact('todos', 'points'));
    }
    

}
