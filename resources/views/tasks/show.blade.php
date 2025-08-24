@extends('layouts.app')

@section('styles')

@endsection

@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">⬅️ Back to
            tasks</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created: {{ $task->created_at->diffForHumans() }} • Updated:
        {{ $task->updated_at->diffForHumans() }}</p>


    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
            class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-500">Edit
            task</a>



        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10" type="submit">Mark as {{ $task->completed ? 'Uncompleted' : 'Completed' }}</button>
        </form>



        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10" type="submit" value="Delete task">
        </form>

    </div>
@endsection
