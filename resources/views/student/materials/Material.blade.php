@extends('layouts.student')
@section('title') - Diploma's Materials @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Materials</h4>
                </div>
                <div class="pb-20">
                    <table class="table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Material Title</th>
                                <th class="table-plus datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $material)
                            @foreach ($diplomas as $diploma)
                                @if ($material->diploma_id == $diploma->id AND $diploma->id == Auth::user()->diploma_id)
                                <tr>
                                <td>{{$material->title}}</td>
                                <td>
                                    <a class="dropdown-item" href="{{URL::asset('uploads/Materials/' . $material->material_docs)}}" download><i class="icon-copy dw dw-download"></i> Download</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection