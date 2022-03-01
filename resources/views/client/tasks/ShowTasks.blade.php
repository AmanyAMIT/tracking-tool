@foreach ($tasks as $task)
    @if ($task->client_id == Auth::guard('client')->user()->id)
        <h1>{{$task->name}}</h1> <br>
        <h1>{{$task->marks}}</h1> <br>
        <h1>{{$task->descriptions}}</h1> <br>
        <h1>{{$task->requirements}}</h1> <br>
    @endif
@endforeach