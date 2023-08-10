<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/material-kit.css') }}">


    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
  <section class="container d-flex flex-column ">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
               
                <!-- Card body -->
                <div class="card-body p-6">
                  
                   
                    <div class="mb-4 ">
                        <div class="row">
                            <div class="col"></div>
                            {{-- <div class="col"> <a href="{{route('/')}}"><img src="{{$websitesetup->logo}}" class="rounded mx-auto d-block" alt=""></a> --}}
                            </div>
                            <div class="col"></div>
                        </div>
                        <h3 class="mb-1 fw-bold">Sign in</h3>
                        {{-- <span class="opacit">if you don't have an account?</span>
                        <a href="{{route('register')}}" class="text-primary ">Sign up</a> --}}
                    </div>

                    {{-- Validation Errors --}}
                    @if (count($errors))
                    <div class="div alert-danger text-white p-3">
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
                        <div class="mb-3 input-group input-group-outline my-3">
                            {{-- <label for="email" class="form-label">Email</label> --}}
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" >
                        </div>
                        <!-- Password -->
                        <div class="mb-3 input-group input-group-outline my-3">
                            {{-- <label for="password" class="form-label">Password</label> --}}
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                        
                        @if (Route::has('password.request'))
                       
                        <div class="mb-3">
                            <a class="underline text-sm  " href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                         @endif
                        
                        <div class="text-cente">
                            <!-- Button -->
                            <div class="d-grid " style="width: 30%">
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


<script src="{{asset('backend/vendor/global/global.min.js')}}"></script>
	<!-- Chart piety plugin files -->
    <script src="{{asset('backend/vendor/peity/jquery.peity.min.js')}}"></script>

    <script src="{{asset('backend/js/validate.min.js')}}"></script>

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


