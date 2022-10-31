@extends('layouts.main')

@section('main-content')
    <!-- /.card -->

    <div class="card">
        <div class="card-header">
            <ul class="navbar list-unstyled m-0 p-0">
                <li>
                    <h3 class="card-title">Biz haqimizda</h3>
                </li>
                <li>
                    <!-- SEARCH FORM -->
                    <form action="{{ route('about.index') }}" method="get" class="form-inline m-0 ml-md-3">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input name="search" value="{{ $search }}" class="form-control form-control-navbar" type="search" placeholder="Qidirish" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body pt-0 table-responsive">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                    <th>N</th>
                    <th>Bosh</th>
                    <th>Text
                        @if(Auth::user()->role == 1)
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#about_add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                            <div class="modal fade" id="about_add">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h4 class="modal-title">Travel qo'shish</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bosh</label>
                                                        <input name="head" type="text" class="form-control" value="" id="exampleInputEmail1" placeholder="Bosh kiriting">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Text</label>
                                                        <textarea name="text" type="text" class="form-control" value="" id="exampleInputEmail1" placeholder="Text kiriting"></textarea>
{{--                                                        <input name="text" type="text" class="form-control" value="" id="exampleInputEmail1" placeholder="Text kiriting">--}}
                                                    </div>



                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                                        <label class="form-check-label" for="exampleCheck1">Tekshirish</label>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Yopish</button>
                                                <button type="submit" class="btn btn-outline-light">Saqlash</button>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @else
                            Huquq
                        @endif

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($abouts as $about)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $about->head }}</td>
                        <td>{{ $about->text }}</td>


                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
