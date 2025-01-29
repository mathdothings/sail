<?php
namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function show($id)
    {
        return response()->json(Task::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'tag'       => 'required',
            'completed' => 'required'
        ]);

        $post = Task::create($request->all());
        return response()->json(new TaskResource($post), 201);
    }

    public function update(Request $request, $id)
    {
        $post = Task::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(null, 204);
    }
}
