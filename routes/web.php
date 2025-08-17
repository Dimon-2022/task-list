<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);

    return view('tasks.index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'tasks.create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {

    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');





Route::post('/tasks', function (TaskRequest $request) {
    $data = $request->validated();

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task])->with('success', 'Successfully stored');
})->name('tasks.store');


Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $data = $request->validated();
    $task->update($data);



    return redirect()->route('tasks.show', ['task' => $task])->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task deleted successfully');
})->name('tasks.destroy');
