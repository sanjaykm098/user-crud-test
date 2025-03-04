<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|min:512',
        ], [
            'images.*.required' => 'The image field is required.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'The image may not be greater than 1024 kilobytes.',
            'images.*.min' => 'The image must be at least 512 kilobytes.',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->user_id = $request->user_id;
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = $image->hashName();
                $image->move(public_path('images'), $imageName);
                $images[] = 'images/' . $imageName;
            }
            $task->images = json_encode($images);
        }
        $task->save();

        return redirect()->route('dashboard')->with('message', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        // dd(1);
        return view('user.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        return view('user.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024|min:512',
        ], [
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'The image may not be greater than 1024 kilobytes.',
            'images.*.min' => 'The image must be at least 512 kilobytes.',
        ]);

        $task = Task::where('id', $id)->firstOrFail();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->user_id = $request->user_id;
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = $image->hashName();
                $image->move(public_path('images'), $imageName);
                $images[] = 'images/' . $imageName;
            }
            $task->images = json_encode($images);
        }
        $task->save();

        return redirect()->route('dashboard')->with('message', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->delete();

        return redirect()->route('dashboard')->with('message', 'Task deleted successfully.');
    }
}
