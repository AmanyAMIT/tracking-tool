@if ($task->client_id == Auth::guard('client')->user()->id)
    <h1>
        {{$task->name}} <br>
        {{$task->marks}} <br>
        {{$task->descriptions}} <br>
        {{$task->requirements}} <br>
        {{$task->task_category->name}} <br>
        {{$task->diploma->name}}
    </h1>
<p>How many submittions?</p>
@foreach ($solved_tasks as $solved_task)
    <p>
    @if ($task->id == $solved_task->task_id)
        <p>{{$solved_task_count}}</p>
    @endif
</p>
@endforeach


<hr>

<p>Who solved this task?</p>
<p>{{$solved_task->user->name}}</p>

@endif