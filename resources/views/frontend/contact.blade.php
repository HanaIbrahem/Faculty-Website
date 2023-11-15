 @extends('frontend.layout.master')

 @php
     $loc = '';
     if (Session::get('locale') == 'ku') {
         $loc = '_ku';
     }

     $faculty = \App\Models\Faculty::find(1);

 @endphp
 @section('main')
 <header>
    <div class="page-header min-vh-75" style="background-image: url('{{ asset('images/'.$faculty->cover) }}')"
        loading="lazy">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
            <div class="row"  data-aos="zoom-in" >
                <div class="col-lg-8 mx-auto text-white text-center py-5">
                    <h2 class="text-white mb-3">{{__('message.contact_q')}}</h2>
                    <p class="lead text-white mb-6">
                       {{__('message.contact_p')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>


 <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6 mb-4">
     {{-- <div class="container">
         <div class="row mt-sm-0 mt-5">
             <div class="col-lg-3 col-md-4 position-relative ms-lg-auto">
                 <div class="p-3 text-center border-right-after">
                     <i class="material-icons text-gradient text-info text-5xl mb-3 fa-solid fa-envelope"></i>
                     <h6 class="mb-0">Email</h6>
                     <p class="text-dark font-weight-normal">help@soran.edu.iqs.com</p>
                 </div>
             </div>
             <div class="col-lg-3 col-md-4 position-relative">
                 <div class="p-3 text-center border-right-after">
                     <i class="material-icons text-gradient text-info text-5xl mb-3 fa fa-phone"></i>
                     <h6 class="mb-0">Phone</h6>
                     <p class="text-dark font-weight-normal"dir="ltr">+964(750) 000 0000</p>
                 </div>
             </div>
             <div class="col-lg-3 col-md-4 me-lg-auto">
                 <div class="p-3 text-center">
                     <i class="material-icons text-gradient text-info text-5xl mb-3 fa-solid fa-address-book"></i>
                     <h6 class="mb-0">Contact</h6>
                     <p class="text-dark font-weight-normal">Andrew Samian</p>
                 </div>
             </div>
         </div>
     </div> --}}
     <section class="py-md-7 py-3" >
         <div class="container my-4 my-sm-0 px-0 px-sm-3 ">
             <div class="row align-items-center">
                 <div class="col-lg-8 col-10 mx-auto text-center">
                     <div class="mb-md-5">
                         <h3 data-aos="zoom-in" >{{__('message.contact')}}</h3>
                        
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-8 mx-auto">
                    @if (session('message'))
                    <script>
                        window.alert("{{ session('message') }}");
                    </script>
            
                @endif
                    @if (count($errors))
                    <div class="alert text-danger">
                        @foreach ($errors->all() as $error)
                            <p class="">{{$error}}</p>
                        @endforeach
                    </div>
                        
                    @endif
                     <div class="card card-plain">
                         <form action="{{route('contact.store')}}" dir="{{$loc=='_ku'?'rtl':'ltr'}}" id="myForm" method="post" >
                            @csrf
                            @method('POST')
                             <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group input-group input-group-static mb-4">
                                            <label>{{__('message.first_name')}}</label>
                                            <input class="form-control bg-light" placeholder="" aria-label="First Name..."
                                                type="text" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <div class="input-group form-group input-group-static">
                                            <label>{{__('message.last_name')}}</label>
                                            <input type="text" class="form-control bg-light" 
                                                aria-label="Last Name..."  name="lname">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group form-group input-group-static">
                                        <label>{{__('message.email')}}</label>
                                        <input type="email"  name="email" class="form-control bg-light">
                                    </div>
                                </div>
                                <div class="input-group form-group input-group-static mb-4">
                                    <label>{{__('message.message')}}</label>
                                    <textarea name="message"  name="message" class="form-control bg-light" id="message" rows="4"></textarea>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-primary w-100">{{__('message.send')}}</button>
                                    </div>
                                </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
 


<script src="{{asset('backend/assets/vendor/jqury/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/validate.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {

                name:{
                     
                      
                      required : true,
                    },email:{
                        required : true,

                    },message:{
                        required : true,
                    },lname:{
                        required : true, 
                    }
                },
                
                messages  :{
                   
    

                    name:{
                        required : 'Please Enter your Name',
                    } 
                    ,email:{
                        required : 'Please Enter your Email',

                    },message:{
                        required : 'Please Enter your Message',

                    },lname:{
                        required : 'Please Enter your Last Name',

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

<script type="text/javascript">
        
    var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
  URL.revokeObjectURL(output.src) // free memory
}
};

</script>

@endsection
