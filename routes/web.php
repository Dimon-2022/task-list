<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    $tasks = Task::latest()->get();

    return view('tasks.index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'tasks.create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');





Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title'=>['required', 'max:255'],
        'description'=>['required'],
        'long_description' =>['required'],
    ]);

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['id'=> $task->id])->with('success','Successfully stored');
})->name('tasks.store');
