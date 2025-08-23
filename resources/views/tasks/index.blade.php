@extends('layouts.app')

@section('title', 'Task list:')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add task!</a>
    </nav>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold'=>!$task->completed ,'line-through'=>$task->completed])> {{ $task->title }}</a>
            </li>
        @endforeach

    </ul>

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
