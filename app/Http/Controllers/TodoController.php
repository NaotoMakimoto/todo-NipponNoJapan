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
    $points = Todo::sum('point');
    
    // レベルの計算
    $level = floor($points / 25) + 1; // 100ポイントごとにレベルが上がると仮定
    
    return view('posts.index', compact('todos', 'points', 'level'));
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
    $todos = Todo::all(); 
    // $points = $todos->sum('points'); 
    $points = Todo::sum('point'); 
    $level = floor($points / 100) + 1;     
    return view('posts.level', compact('todos', 'points'));
    } 

    function create()
    {
        $todos = Todo::all();
        $points = Todo::sum('point'); 
        $level = floor($points / 100) + 1;  
        return view('posts.create', compact('todos', 'level'));
    }

    function store(Request $request)
    {
        $todos = new Todo;
        $todos->title = $request -> title;
        $todos->point = $request -> point; 
        
        $todos -> user_id = Auth::id();

        $todos -> save();

        return redirect() -> route('todo.index');

    }

    function destroy(Request $request)
    {
        $selectedIds = $request->input('selected_items', []);
        Todo::whereIn('id', $selectedIds)->delete();

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

    function showPage()
    {
        // show.blade.phpに必要なデータを取得する処理を記述
        return view('posts.show', $data); // 必要なデータを渡してshow.blade.phpを表示
    }


    function nextLevelPoints()
    {
        $todos = Todo::all();
        $points = Todo::sum('point');
        
        // レベルの計算
        $level = floor($points / 25) + 1; // 25ポイントごとにレベルが上がると仮定
        
        // 次のレベルまでのポイントを計算
        $nextLevelPoints = ($level * 25) - $points;
        
        return view('posts.level', compact('todos', 'points', 'nextLevelPoints', 'level'));
    }
    
}
