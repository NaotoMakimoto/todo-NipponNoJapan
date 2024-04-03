<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BonuspointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ]);

        // Handle the file upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/img'), $imageName);

            // Create a new Bonus entry
            $bonus = new Bonus();
            $bonus->image = $imageName;
            // You might want to associate other data with the bonus as well
            $bonus->save();

            // return response()->json(['success' => 'Image uploaded successfully', 'image' => $imageName]);

            Session::flash('success', 'Image uploaded successfully.');
            return redirect() -> route('show');
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $bonuses = Bonus::all();
        $todos = Todo::where('user_id', $userId)->get();
        $users = User::all();
        // $points = $todos->sum('points'); 
        $points = $todos->sum('point'); 
        $level = floor($points / 25) + 1; // 25ポイントごとにレベルが上がると仮定
        return view('posts.show', compact('bonuses','level', 'user', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bonus = Bonus::findOrFail($id);
        $bonus->delete();

        return redirect()->back()->with('success', '投稿が削除されました。');
    }
}
