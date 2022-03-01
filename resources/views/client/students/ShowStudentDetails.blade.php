@if ($student->client_id == Auth::guard('client')->user()->id)
    <h1>
        {{$student->name}}
        {{$student->diploma->name}}
    </h1>
    @foreach ($solved_tasks as $solved_task)
        @if ($solved_task->user_id == $student->id)
        <p>
        {{$solved_task->task->name}} :
        <span>{{$solved_task->comments}}</span> :
        @if ($solved_task->status == 0)
        <span>Pending</span>
        @elseif($solved_task->status == 1)
        <span>Passed</span>
        @else
        <span>Failed</span>
        @endif
        </p>
        @endif

    @endforeach
    
@endif