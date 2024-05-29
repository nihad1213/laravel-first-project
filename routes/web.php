<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


Route::get('/', function () {
  return redirect()->route('task.index');
});


Route::get('/tasks', function () {
  return view('index', [
      'tasks' => Task::paginate(7)
  ]);
})->name('task.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', ['task' => $task]);
})->name('task.edit');

//One single task
Route::get('/tasks/{task}', function (Task $task) {
  return view('show', ['task' => $task]);
})->name('task.show');

Route::post('/tasks', function(TaskRequest $request) {
  //$data = $request->validated();
  //$task = new Task();
  //$task->title = $data['title'];
  //$task->description = $data['description'];
  //$task->long_description = $data['long_description'];

  //$task->save();
  $task = Task::create($request->validated());

  return redirect()->route('task.show', ['task' => $task['id']])
    ->with('success', 'Task created succesfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
  //$data = $request->validated();

  //$task->title = $data['title'];
  //$task->description = $data['description'];
  //$task->long_description = $data['long_description'];

  //$task->save();

  $task->update($request->validated());

  return redirect()->route('task.show', ['task' => $task['id']])
    ->with('success', 'Task created succesfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task) {
  $task->delete();

  return redirect()->route('task.index')->with('success', 'Task deleted Successfully');
})->name('tasks.destroy');

Route::put('/tasks{task}/toggle-complete', function(Task $task) {
  $task->toggleComplete();

  return redirect()->back()->with('success', 'Task Updated Successfully!');
})->name('tasks.toggle-complete');

Route::fallback(function () {
    return 'ERROR';
});