@php
    $faculty = \App\Models\Faculty::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/material-kit.css') }}">
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/' . $faculty->logo) }}">
    <title>{{ $faculty->title  }}</title>
</head>
<body>
  <section class="container d-flex flex-column ">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-6 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
               
                <!-- Card body -->
                <div class="card-body p-4 text-center">
                  
                   
                    <div class="mb-4 ">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                 <a href="{{route('frontend.index')}}">
                                    <img style="max-width:100px;max-height:100px" src="{{asset('images/'.$faculty->logo)}}" class="rounded mx-auto d-block" alt="">
                                 </a>
                            </div>
                            <div class="col"></div>
                        </div>
                        <h3 class="mb-1 fw-bold">Sign in</h3>
                        {{-- <span class="opacit">if you don't have an account?</span>
                        <a href="{{route('register')}}" class="text-primary ">Sign up</a> --}}
                    </div>

                    {{-- Validation Errors --}}
                    @if (count($errors))
                    <div class="alert text-danger p-1">
                        @foreach ($errors->all() as $message )
                            <p class="m-0 p-0">{{ $message}}</p>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form -->
                
                    <form   method="POST" action="{{ route('login') }}" id="myForm">
                        @csrf
                        <!-- Username -->
                       
                        <!-- Email -->
                        <div class="mb-3 input-group form-group input-group-outline my-3">
                            {{-- <label for="email" class="form-label">Email</label> --}}
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" >
                        </div>
                        <!-- Password -->
                        <div class="mb-3 input-group form-group input-group-outline my-3">
                            {{-- <label for="password" class="form-label">Password</label> --}}
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                        
                        @if (Route::has('password.request'))
{{--                        
                        <div class="mb-3">
                            <a class="underline text-sm  " href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div> --}}
                         @endif
                        
                        <div class="text-center">
                            <!-- Button -->
                            <div class="d-grid" style="width: 30%">
                                <button type="submit" class="rounded btn btn-primary">Login
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    

	<!-- Chart piety plugin files -->

    <script src="{{asset('backend/assets/vendor/jqury/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/validate.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {

                password:{
                     
                      
                      required : true,
                    },email:{
                        required : true,

                    }
                },
                messages  :{
                   
    

                    password:{
                        required : 'Please Enter password',
                    } 
                    ,email:{
                        required : 'Please Enter your Email',

                    }
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>


</body>
</html>


