@extends('layouts.main')
@section('main-content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Admin tahrirlash</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ism</label>
                    <input name="name" type="text" class="form-control" value="{{ $admin->name }}" id="exampleInputEmail1" placeholder="Ism kiriting">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" value="{{ $admin->email }}" id="exampleInputEmail1" placeholder="Email kiriting">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Parol</label>
                    <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Yangi parol" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputFile">File rasm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" id="imgInp" onchange="preview(frame)" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Tanlang</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Yuklash</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="mb-2" for="rasm"><b>Rasm</b></label>
                        <img id="frame" class="ml-2" src="{{asset('public/assets-turist/images/'.$admin->image)}}" width="100px" height="100px" alt="Rasm"/>
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Tekshirish</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Saqlash</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
