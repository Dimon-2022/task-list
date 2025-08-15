@extends('layouts.app')

@section('title', 'Edit task')

@section('styles')
    <style>
        .error-message {
            color:red;
            font-size: 0.8 rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.update',['task'=>$task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{$task->title}}">
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
            @error('description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Edit task</button>
        </div>
    </form>
@endsection
