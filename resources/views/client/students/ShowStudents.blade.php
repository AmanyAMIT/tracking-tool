@foreach ($students as $student)
    @if ($student->client_id == Auth::guard('client')->user()->id)
        <h1>{{$student->name}}</h1> <br>
    @endif
@endforeach