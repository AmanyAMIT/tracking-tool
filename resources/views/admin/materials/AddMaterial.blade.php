@extends('layouts.admin')
@section('title')
    - Add Material
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add New Material</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">Fill Material's Details</h4>
                    </div>
                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard" method="POST" action="{{ route('materials.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>General Details</h5>
                            <section>
                                <div class="row align-items-center">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Material's Title :</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <input type="file" id="real-file" hidden="hidden" name="material_docs" @error('material_docs') is-invalid @enderror/>
                                                <button type="button" id="custom-button">Browse</button>
                                                <span id="custom-text">No file chosen, yet.</span>
                                                @error('material_docs')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign to a Diploma :</label>
                                            <select class="custom-select form-control" name="diploma_id">
                                                @foreach ($diplomas as $diploma)
                                                    <option value="{{ $diploma->id }}">
                                                        {{ $diploma->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign to a Topic :</label>
                                            <select class="custom-select form-control" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </section>
                            <input type="submit" value="Add Material" class="btn btn-primary btn-wide mt-5 ml-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

        </script>
    @endsection
