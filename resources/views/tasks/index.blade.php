<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Laravel</title>

    </head>
    <body>
    @foreach ($tasks as $task)
        <li>
            <a href="/tasks/{{ $task->id }}">
                {{ $task->body }}
            </a>
        </li>
        @endforeach
    </body>
</html>
