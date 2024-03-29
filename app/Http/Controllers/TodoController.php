<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function level()
    {
        $todos = Todo::all();
        return view('posts.level', ['todos' => $todos]);
    }

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
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id); // 対象のTodoを取得
        $todo->point++; // pointをインクリメント
        $todo->save(); // 変更を保存
    
        return response()->json(['success' => 'ポイントが更新されました']);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id); // 対象のTodoを取得
        $todo->point++; // pointをインクリメント
        $todo->save(); // 変更を保存
    
        return response()->json(['success' => 'ポイントが更新されました']);
    }
}
