<ul>
    @foreach ($tasks as $task)
        <li>
            <a href="{{route('tasks.show', ['id'=>$task->id])}}"> {{ $task->title }}</a>
        </li>
    @endforeach
</ul>
