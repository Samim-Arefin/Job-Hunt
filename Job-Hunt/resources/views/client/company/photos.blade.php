@extends('client.layout.app') 
@section('title', 'Company Photos') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Company Photos</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('client.company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12" style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                <h4>Add Photo</h4>
                <form action="{{ route('company.photo-submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                        </div>
                    </div>
                </form>

                <h4 class="mt-4">Existing Photos</h4>
                <div class="photo-all">
                    @if($photos->count() == 0)
                    <div class="row">
                        <div class="col-md-12 text-danger">
                            No Photo is Found
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        @foreach($photos as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="item mb-1">
                                <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                                    <img src="{{ asset('uploads/'.$item->photo) }}" alt="company photos">
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Delete</button>
                            <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center gap-2 px-3 pb-3">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <div>
                                                <form action="{{ route('company.photo-delete', $item->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
            backgroundColor: 'green',
        });
    </script>
@endif

@if(session()->get('error'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
            backgroundColor: '#ff0033',
        });
    </script>
@endif

@endsection