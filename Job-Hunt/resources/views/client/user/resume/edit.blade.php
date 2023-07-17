@extends('client.layout.app')
@section('title', 'Edit User Resume')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Edit User Resume</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('client.user.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <a href="{{ route('user.resume') }}" class="btn btn-primary btn-sm mb-2"><i class="fas  fa-plus"></i> See All</a>
                <div class="card"
                        style="margin: 10px auto; padding: 10px 20px 10px 20px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('user.resume-update', $resume->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">File Name *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $resume->name }}">
                                 @error('name')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Existing File *</label>
                            <div class="form-group">
                                <a href="{{ asset('uploads/'.$resume->file) }}" target="_blank">{{ $resume->file }}</a>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change File *</label>
                            <div class="form-group">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection