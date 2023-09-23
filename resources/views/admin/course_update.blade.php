@extends('admin.layout.master')

@section('main')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="m-3">
                <h3 class="">
                    {{$department->name}} Science Department
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update {{$course->name}} Course
                    </h4>
                </div>
               
                <div class="card-body">
                    <div class="basic-form">
                        @if (count($errors))
                            <div class="div alert-danger text-danger p-3">
                                <ul>
                                    @foreach ($errors->all() as $message)
                                        <li class="m-0 p-0">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('course.update') }}" enctype="multipart/form-data">

                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{$course->id}}" name="id">
                            <div class="form-group mb-3 mt-3">
                                <label for="">Name</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " value="{{$course->name}}" name="name" type="text" placeholder="">
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="">Name Kurdish</label><span class="text-danger fs-4">*</span>
                                <input class="form-control "  dir="rtl" value="{{$course->name_ku}}"  name="name_ku" type="text" placeholder="">
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Image</label>
                                <input class="form-control" type="file" name="image" placeholder="Default input"
                                    id="uploadInput" accept="image/*">

                            </div>

                            <div class="form-group mb-5">


                                <div class="col-xl-6"
                                    style=" max-width:200px;
                            max-height: 200px;
                            margin-top: 10px;">
                                    <div class="card mb-3">
                                        <img class="img-fluid" style="width: 100%;height:100%" id="imagePreview"
                                            src="{{asset('images/course/'.$course->image)}}" alt="Image Preview">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3 mt-3">
                                <label for="">CTS Number</label><span class="text-danger fs-4">*</span>
                                <input class="form-control "  value="{{$course->cts}}" name="cts" type="text" placeholder="">
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="">Level</label><span class="text-danger fs-4">*</span>

                                <select class="form-control input-group" name="type" id="">                            
                                    <option class="mb-2 form-control" value="doctoral"{{ $course->type == 'doctoral' ? 'selected' : '' }}>Doctoral</option>
                                    <option class="mb-2 form-control" value="master" {{ $course->type == 'master' ? 'selected' : '' }}>Master</option>
                                    <option class="mb-2 form-control" value="bachelor" {{ $course->type == 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                                    <option class="mb-2 form-control" value="diploma" {{ $course->type == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                </select>
                            </div>

                            <div class="form-group mt-6 mb-3">
                                <label for="">Description </label><span class="text-danger fs-4">*</span>
                                <textarea id="elm1" name="description">
                                {!! $course->description !!}
                            </textarea>
                            </div>

                            <div class="form-group mt-6 mb-3">
                                <label for="">Description Kurdish</label><span class="text-danger fs-4">*</span>
                                <textarea id="elm1_ku" name="description_ku">
                                    {!! $course->description_ku !!}
                            </textarea>
                            </div>

                            <div class="form-group mb-3">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const uploadInput = document.getElementById('uploadInput');
        const imagePreview = document.getElementById('imagePreview');

        uploadInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    imagePreview.src = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
            }
        });
    </script>
@endsection

@section('textare')
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection


