@extends('admin.layout.master')

@section('main')

    <section class="py-4">
        <div class="container">
            <h3>Departments</h3>
            <div class="row justify-space-between py-2">
                @if ($departmentcount > 0)
                  @foreach ($department as $item )
                  <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                    <div class="card card-profile mt-md-0 mt-5">
                        <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                            <a class="d-block blur-shadow-image">
                                <a href="{{route('department.show',$item->id)}}"><img src="{{asset('images/department/'.$item->image)}}" alt="{{$item->name}}}"
                                    class="img-fluid w-100 border-radius-lg" style="max-height: 221px;max-width:348px">
                            </a>
                        </div>
                        <div class="card-body text-center">
                             <h4 class="mb-0"><a class="nav-link " href="{{route('department.show',$item->id)}}">{{$item->name}}</a></h4>
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-4 col-4">
                                    <h5 class="text-warning mb-2">Edit</h5>
                                    <a href="{{route('department.edit',$item->id)}}" class="btn btn-warning"><i class="fa fa-pen"></i> </a>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <h5 class="text-danger mb-2">Delete</h5>
                                    <a href="{{route('department.destroy',$item->id)}}"  class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  @endforeach

                @else
                    <p class="text-center">NO Department</p>
                @endif

            </div>
        </div>
    </section>


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Department</h4>
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
                        <form method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3 mt-3">
                                <label for="">Name</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " required value="" name="name" type="text" placeholder="">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="">Name Kurdish</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " required dir="rtl" value="" name="name_ku" type="text" placeholder="">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Image</label><span class="text-danger fs-4">*</span>
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
                                            src="" alt="Image Preview">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group mt-6 mb-3">
                                <label for="">Description </label><span class="text-danger fs-4">*</span>
                                <textarea id="elm1" name="detail">
                            </textarea>
                            </div>

                            <div class="form-group mt-6 mb-3">
                                <label for="">Description Kurdish</label><span class="text-danger fs-4">*</span>
                                <textarea id="elm1_ku" name="detail_ku">
                            </textarea>
                            </div>

                            <div class="form-group mb-3">
                                <input type="submit" value="Insert" class="btn btn-primary">
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

@section('switalertjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/js/plugin/sweetalert.init.js')}}"></script>
@endsection

