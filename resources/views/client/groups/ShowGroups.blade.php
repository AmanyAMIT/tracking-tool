@foreach ($groups as $group)
    @if ($group->client_id == Auth::guard('client')->user()->id)
        <h1>
            {{$group->group_name}} <br>
        </h1>
    @endif
@endforeach
