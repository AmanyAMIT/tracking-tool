@foreach ($client_diplomas as $client_diploma)
    @if ($client_diploma->client_id == Auth::guard('client')->user()->id)
        @foreach ($diplomas as $diploma)
            @if ($client_diploma->diploma_id == $diploma->id)
                <h1>
                    {{ $diploma->name }} <br>
                </h1> <br>
            @endif
        @endforeach
    @endif
@endforeach
