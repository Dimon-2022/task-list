@extends('layouts.app')

@section('title', 'Create new task')

@section('content')
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <label for="title">Title of my task:</label>
        <input id="title" type="text" name="title" value="">
        <input type="text" name="description" value="">
        <textarea name="long_description"></textarea>
        <input type="submit" value="Submit">
    </form>
@endsection
