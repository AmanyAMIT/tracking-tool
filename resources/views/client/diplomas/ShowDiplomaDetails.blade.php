@foreach ($client_diplomas as $client_diploma)
    @if ($client_diploma->client_id == Auth::guard('client')->user()->id)
            @if ($client_diploma->diploma_id == $diploma->id)
                <h1>{{ $diploma->name }}'s details are here</h1>
            @endif
    @endif
@endforeach
