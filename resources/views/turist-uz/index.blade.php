@extends('layouts.turist-app')



@section('main')

<!-- our_packages -->
<div class="our_packages">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-12">
                <form id="table" class="table_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titlepage text_align_left ">
                                <h3>Biz taklif qilamiz</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Mamlakat :</label>
                            <input class="contactus" placeholder="Mamlakat" type="text" name="destinations">
                        </div>
                        <div class="col-md-4">
                            <label>Ketish vaqti :</label>
                            <input type="text" class="contactus" id="my_date_picker" placeholder="mm-dd-yy" >
                        </div>

                        <div class="col-md-4">
                            <label>Narxlar :</label>
                            <select id='seluser' class="contactus" >
                                <option value='0'>$790</option>
                                <option value='1'>$890</option>
                                <option value='2'>$990</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{Request::is('news') ? route('main').'/':'' }}#contact" class="send_btn">Buyurma berish</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end our_packages -->
<!-- packages -->
<div class="packages" id="trip">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center ">
                    <h2>Sayohatlar</h2>
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
                <a class="read_more" href="#contact">Bururtma berish</a>
            </div>
        </div>
    </div>
</div>
<!-- end packages -->
<!-- about -->
<div class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center">
                    <h2>{{ $about[0]->head }}</h2>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="about_text text_align_center">
                    <p>
                        {{ $about[0]->text }}
                    </p>
                    <a class="read_more" href="#contact">Buyurtma berish</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end about -->





{{--  contact us   --}}

<div class="contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage text_align_center">
                    <h2>Bog'lanish</h2>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <form id="request" class="main_form" action="{{ route('message') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="cont_in" placeholder="Ism Sharifingiz" type="type" name="name">
                        </div>
                        <div class="col-md-12">
                            <input class="cont_in" placeholder="Emailingiz" type="type" name="email">
                        </div>
                        <div class="col-md-12">
                            <input class="cont_in" placeholder="Tel nomeringiz" type="type" name="phone">
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea2" style="color:#676767;" placeholder="Talab va takliflar" type="type" name="message"> </textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btnt" type="submit">Jo'natish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--   end contact   --}}


@endsection
