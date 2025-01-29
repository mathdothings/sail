<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            'title'     => ['required', 'string', 'max:100'],
            'tag'       => ['required', 'string', 'max:25'],
            'completed' => ['required', 'boolean']
        ]);

        Task::create($request->all());
        return response()->json(null, Response::HTTP_CREATED);
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
