
    @if ($group->client_id == Auth::guard('client')->user()->id)
        <h1>
            {{$group->group_name}} <br>
            {{$group->diploma->name}} <br>
            @foreach ($students as $student)
                @if ($student->group_id == $group->id)
                    {{$student->name}} <br>
                @endif
                
            @endforeach
            
        </h1> 
    @endif
