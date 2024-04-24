<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {

        $todos = new Todo;
        $todos->title = request()->title;
        $todos->description = request()->description;
        $todos->is_completed = 0;
        $todos->save();


        // Todo::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_completed' => 0
        // ]);

        $request->session()->flash('alert-success', 'Created Success');

        return to_route('todo.index');
    }
}
