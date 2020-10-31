<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        return ToDo::all();
    }

    public function store(Request $request)
    {
        return ToDo::create($request->all());
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return $todo;
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return $todo;
    }
}
