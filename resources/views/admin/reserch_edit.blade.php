@extends('admin.layout.master')


@section('main')
    

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Research</h4>
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
                    <form method="POST" action="{{ route('research.update') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{$research->id}}">
                        <div class="form-group mb-3 mt-3">
                            <label for="">Title</label><span class="text-danger fs-4">*</span>
                            <input class="form-control " value="{{$research->name}}" name="name" type="text" placeholder="">
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <label for="">Title Kurdish</label><span class="text-danger fs-4">*</span>
                            <input class="form-control " dir="rtl" value="{{$research->name_ku}}" name="name_ku" type="text" placeholder="">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label for="">Auther</label><span class="text-danger fs-4">*</span>
                            <input class="form-control " value="{{$research->auther}}" name="auther" type="text" placeholder="">
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <label for="">Auther Kurdish</label><span class="text-danger fs-4">*</span>
                            <input class="form-control " dir="rtl" value="{{$research->auther_ku}}" name="auther_ku" type="text" placeholder="">
                        </div>

                        <div class="form-group mb-3 mt-3 w-50">
                            <label for="">Department</label><span class="text-danger fs-4">*</span>
                            <select class="form-control" name="department" id="">
                                @foreach ($depart as $item )
                                  @if ($item->id == $research->department_id) <!-- Replace $currentDepartmentId with the actual variable containing the department id of the item being edited -->
                                      <option class="mt-1" value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                  @else
                                      <option class="mt-1" value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">File</label><span class="text-danger fs-4">*</span>
                            <input class="form-control" type="file" name="file">
                            <td><a href="{{ route('research.download', ['filename' => $research->file]) }}" download>{{$research->name}}</a>

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
                                        src="{{asset('images/research/'.$research->image)}}" alt="{{$research->name}}">

                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-6 mb-3">
                            <label for="">Description </label><span class="text-danger fs-4">*</span>
                            <textarea id="elm1" name="description">
                                {!! $research->description !!}
                        </textarea>
                        </div>

                        <div class="form-group mt-6 mb-3">
                            <label for="">Description Kurdish</label><span class="text-danger fs-4">*</span>
                            <textarea id="elm1_ku" name="description_ku">
                                {!! $research->description_ku !!}
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


