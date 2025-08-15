@extends('layouts.app')

@section('styles')
    <style>
        .flash-message{
            color:red;
            background:green;
            border-radius:10px;
        }
    </style>
@endsection

@section('title', $task->title)

@section('content')


    <p>{{ $task->description }}</p>


    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <a href="{{route('tasks.edit',['task'=>$task->id])}}" style="color:green">Edit task</a>
@endsection
