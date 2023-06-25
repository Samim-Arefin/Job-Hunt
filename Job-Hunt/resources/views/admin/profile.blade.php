@extends('admin.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.profile-submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="admin" class="profile-photo w_100_p">
                                <input type="file" class="form-control py-2" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                     @error('name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                    @error('email')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                     @error('password')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                                    @error('confirm_password')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
        });
    </script>
@endif
@endsection