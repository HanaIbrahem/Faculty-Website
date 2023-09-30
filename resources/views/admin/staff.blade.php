@extends('admin.layout.master')

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('main')
<section class="py-1">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h6 class="text-gradient text-info text-uppercase">Our Staff</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Rool</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($staff as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->name}}
                                <p>{{$item->name_ku}}</p></td>
                                <td><img src="{{asset('images/staff/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                
                                <td>{{$item->description}}
                                <p>{{$item->description_ku}}</p>
                                </td>
                                <td>{{$item->rool}}
                                <p>{{$item->rool_ku}}</p></td>
                                <td>{{$item->created_at->format('d-m-y')}}</td>
                                <td>{{$item->updated_at->format('d-m-y')}}</td>

                                <td>
                                    <div class="d-flex">
                                    
                                        <div style="margin-right: 4px">
                                            <a href="{{route('staff.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>

                                        </div>

                                        <div >
                                            <a href="{{route('staff.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>

                                        </div>
                                    </div>												
                                </td>	
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      
        
    </div>
</section>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="m-3">
                <h3 class="">
                    Faculty of Science Staff
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Stuff
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
                        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">

                            @csrf
                            @method('POST')
                            <div class="form-group mb-3 mt-3">
                                <label for="">Name</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " value="" name="name" type="text" placeholder="">
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="">Name Kurdish</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " value="" dir="rtl" name="name_ku" type="text" placeholder="">
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
                                            src="" alt="Image Preview">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3 mt-3">
                                <label for="">Rool</label><span class="text-danger fs-4">*</span>
                                <input class="form-control "  value="" name="rool" type="text" placeholder="">
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="">Rool Kurdish</label><span class="text-danger fs-4">*</span>
                                <input class="form-control " value="" dir="rtl" name="rool_ku" type="text" placeholder="">
                            </div>
                           

                            <div class="form-group mt-6 mb-3">
                                <label for="">Description </label><span class="text-danger fs-4">*</span>
                                <textarea class="form-control text-start bg-light" type="text" row='12' id="elm1" name="description">
                            </textarea>
                            </div>

                            <div class="form-group mt-6 mb-3">
                                <label for="">Description Kurdish</label><span class="text-danger fs-4">*</span>
                                <textarea class="form-control text-end bg-light" id="elm1_ku" name="description_ku">
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

@section('switalertjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/js/plugin/sweetalert.init.js')}}"></script>
@endsection

@section('datatablejs')
<script src="{{ asset('backend/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/datatables.init.js') }}"></script>
@endsection
{{-- @section('textare')
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection --}}


