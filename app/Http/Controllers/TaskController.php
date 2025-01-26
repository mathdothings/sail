<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks
    public function index()
    {
        return response()->json(Task::all());
    }

    // Get a single task
    public function show($id)
    {
        return response()->json(Task::findOrFail($id));
    }

    // Create a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tag' => 'required',
            'completed' => 'required'
        ]);

        $post = Task::create($request->all());
        return response()->json($post, 201);
    }

    // Update a task
    public function update(Request $request, $id)
    {
        $post = Task::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    // Delete a task
    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(null, 204);
    }
}
