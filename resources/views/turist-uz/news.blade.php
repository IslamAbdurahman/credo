@extends('layouts.turist-app')



@section('main')

    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('public/assets-turist/images/loading.gif') }}" alt="#"/></div>
    </div>


    <!-- packages -->
    <div class="packages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center ">
                        <h2>Yangiliklar</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($trips as $trip)
                <div class=" col-md-6">
                    <div id="ho_img" class="packages_box" data-aos="fade-right" >
                        <figure><img src="{{ asset('public/assets-turist/images/'.$trip->img) }}" alt="#"/></figure>
                        <div class="tuscany">
                            <div class="tusc text_align_left">
                                <div class="italy">
                                    <h3>{{ $trip->city }}</h3>
                                    <span><img src="{{ asset('public/assets-turist/images/loca.png') }}" alt="#"/>{{ $trip->country }}</span>
                                </div>
                                <div class="italy_right">
                                    <h3>Price</h3>
                                    <span>${{ $trip->price }}</span>
                                </div>
                            </div>
                            <p>
                                {{ $trip->text }}
                            </p>
                            <div class="tusc">
                                <a class="read_more" href="{{Request::is('news') ? route('main').'/':'' }}#contact">Bururtma berish</a>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach

                <div class="col-md-12">
                    <a class="read_more" href="{{Request::is('news') ? route('main').'/':'' }}#contact">Bururtma berish</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end packages -->

@endsection



