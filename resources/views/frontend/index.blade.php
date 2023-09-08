@php
    $faculty = \App\Models\Faculty::find(1);
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp

@extends('frontend.layout.master')

@section('main')
    {{-- Headre  --}}
    <<header class="position-relative">
        <div class="page-header min-vh-75 position-relative"
            style="background-image: url('{{ asset('frontend/assets/img/cover.png') }}');" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto mt-n7">
                        <h1 class="text-white fadeIn2 fadeInBottom">
                            Soran University faculty of Sience
                        </h1>
                        <p class="lead mb-5 fadeIn3 fadeInBottom text-white opacity-8">
                            Stay connected for life to our University community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </header>

        {{-- Body --}}
        <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
            <section>
                <div class="container">
                    <div class="row border-radius-md pb-4 p-lg-3 mx-sm-0 mx-1 position-relative">
                        <div class="card card-plain card-blog mt-5">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card-image position-relative border-radius-lg cursor-pointer">
                                        <div class="blur-shadow-image">
                                            <img class="card-img" src="{{ asset('images/' . $faculty->image) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-auto ms-md-3 mt-md-auto mt-4">
                                    <h3 class="text-dark">{{ __('message.fuculty_info_h') }}</h3>

                                    <p>                                        {!! $faculty->{"description$loc"} !!}
                                    </p>
                                    <div class="author">
                                        <p class="mb-0">{{ __('message.updated_at') }}<a class="ps-1 text-dark"
                                                href="javascript:;"><b>{{ $faculty->updated_at->format('d/m/y') }}</b></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- -------   START CONTENT 1 - title & description and 6 IMAGES   -------- -->
            <section class="py-5 ">
                <div class="container">
                    <div class="row">
                        <div class="col-8 mx-auto text-center mb-5">
                            <h2>{{ __('message.department_index_header') }} </h2>

                        </div>
                    </div>
                    <div class="row g-4 g-xl-5 slider-container d-flex justify-content-center ">

                        @foreach ($department as $item)
                            <div class="col-lg-4 col-sm-10 col-md-5 mx-auto">
                                <div class="card shadow-lg mt-4">
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <a class="d-block blur-shadow-image">
                                            <img style="width:100%; height:200px"
                                                src="{{ asset('images/department/' . $item->image) }}"
                                                alt="{{ $item->name }}" class="img-fluid shadow border-radius-lg ">
                                        </a>

                                    </div>
                                    <div class="card-body text-center">
                                        <h4>
                                            <a class="text-dark"
                                                href="{{ route('frontend.department', $item->id) }}">{{ $item->{"name$loc"} }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- -------   END CONTENT 1 - title & description and 6 IMAGES   -------- -->

            <section class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto text-center">
                            <h6 class="text-gradient text-info text-uppercase">The Executive Team</h6>
                            <h2>Building the future</h2>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-3 col-12 col-md-6 mb-lg-0 mb-5">
                            <div class="card shadow-lg">
                                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img src="https://images.unsplash.com/photo-1536321115970-5dfa13356211?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
                                    </a>
                                    <div class="colored-shadow"
                                        style="background-image: url(&quot;https://images.unsplash.com/photo-1536321115970-5dfa13356211?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0">
                                    <h5 class="mt-3 mb-1 d-md-block d-none">Miriam Lendra</h5>
                                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">Miriam Lendra
                                    </p>
                                    <p class="mb-0 text-xs font-weight-bolder text-info text-gradient text-uppercase">
                                        Desktop Publisher</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 col-md-6 mb-lg-0 mb-5">
                            <div class="card shadow-lg">
                                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
                                    </a>
                                    <div class="colored-shadow"
                                        style="background-image: url(&quot;https://images.unsplash.com/photo-1544717305-2782549b5136?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0">
                                    <h5 class="mt-3 mb-1 d-md-block d-none">Natalie Paisley</h5>
                                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">Natalie
                                        Paisley</p>
                                    <p class="mb-0 text-xs font-weight-bolder text-info text-gradient text-uppercase">Credit
                                        Analyst</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 col-md-6 mb-lg-0 mb-5">
                            <div class="card shadow-lg">
                                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img src="https://images.unsplash.com/photo-1546215364-12f3fff5d578?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
                                    </a>
                                    <div class="colored-shadow"
                                        style="background-image: url(&quot;https://images.unsplash.com/photo-1546215364-12f3fff5d578?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0">
                                    <h5 class="mt-3 mb-1 d-md-block d-none">Mark Audrey</h5>
                                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">Bella Audrey
                                    </p>
                                    <p class="mb-0 text-xs font-weight-bolder text-info text-gradient text-uppercase">
                                        Economist</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 col-md-6 mb-lg-0 mb-5">
                            <div class="card shadow-lg">
                                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img src="https://images.unsplash.com/photo-1519058082700-08a0b56da9b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
                                    </a>
                                    <div class="colored-shadow"
                                        style="background-image: url(&quot;https://images.unsplash.com/photo-1519058082700-08a0b56da9b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0">
                                    <h5 class="mt-3 mb-1 d-md-block d-none">Wang Skylar</h5>
                                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">Mila Skylar
                                    </p>
                                    <p class="mb-0 text-xs font-weight-bolder text-info text-gradient text-uppercase">
                                        Aviation Inspector</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-7 pb-6">
                        <div class="col-lg-6">
                            <h2>Get your own app</h2>
                            <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and
                                that process will continue whatever.</p>
                        </div>
                        <div class="col-lg-6 text-end d-flex flex-column justify-content-center">
                            <button type="button"
                                class="btn bg-gradient-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Join
                                Team</button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    @endsection
