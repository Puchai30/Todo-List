<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $data = Todo::all();
        return view('todo.index', ['todo' => $data]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {

        // $todos = new Todo;
        // $todos->title = request()->title;
        // $todos->description = request()->description;
        // $todos->is_completed = 0;
        // $todos->save);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        session()->flash('alert-success', 'Created Success');

        return to_route('todo.index');
    }

    public function show($id)
    {
        $data = Todo::find($id);
        if (!$data) {
            session()->flash('error', 'Unable to locate todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        return view('todo.show', ['todo' => $data]);
    }

    public function edit($id)
    {
        $data = Todo::find($id);
        if (!$data) {
            session()->flash('error', 'Unable to locate todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        return view('todo.edit', ['todo' => $data]);
    }


    public function update(TodoRequest $request)
    {
        $data = Todo::find($request->goo_id);
        if (!$data) {
            session()->flash('error', 'Unable to locate todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed

        ]);
        session()->flash('alert-info', 'Updated Success');

        return redirect()->route('todo.index');
    }

    public function destory(Request $request)
    {
        $data = Todo::find($request->todo_id);
        if (!$data) {
            session()->flash('error', 'Unable to locate todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        $data->delete();
        session()->flash('alert-success', 'Delete Success');
        return to_route('todo.index');
    }
}
