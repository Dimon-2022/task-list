<?php

use App\Models\Task;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
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
    dd($request);
})->name('tasks.store');
