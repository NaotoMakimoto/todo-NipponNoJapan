<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
         
    // $todos = Todo::all(); 
    // $points = $todos->sum('points'); 

    //  return view('posts.level', compact('todos', 'points'));


    $points = Todo::sum('point'); // Todoモデルのポイント属性に応じて変更してください。

    
    // ビューを返す
    return view('posts.level', compact('points'));


    } 


    

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
        $todos = new Todo;
        $todos->title = $request -> title;
        $todos->point = $request -> point; 
        
        // $todos -> use_id = Auth::id();

        $todos -> save();

        return redirect() -> route('todo.index');

    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id); // 対象のTodoを取得
        $todo->point += $request->point; // pointをインクリメント
        $todo->continuous += $request->continuous; // continuousもインクリメント
        $todo->save(); // 変更を保存
    
        return response()->json(['success' => 'ポイントが正常に増加されました。']);
    }

    public function reset(Request $request, $id)
    {
        $todo = Todo::find($id); // 対象のTodoを取得
        if ($todo) {
            $todo->continuous = 0; // continuousをリセット
            $todo->save(); // 変更を保存

            return response()->json(['success' => '連続値がリセットされました。']);
        } else {
            return response()->json(['error' => 'Todoが見つかりません。'], 404);
        }

    }

}
