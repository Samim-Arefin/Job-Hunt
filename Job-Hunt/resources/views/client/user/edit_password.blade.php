@extends('client.layout.app')
@section('title', 'Edit User Password')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Edit User Password</h2>
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
                    <div class="card"
                        style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                        <div class="card-body">
                            <form action="{{ route('user.edit-password-update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Password</label>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Confirm Password</label>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password"
                                                class="form-control @error('confirm_password') is-invalid @enderror">
                                            @error('confirm_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
                backgroundColor: 'green',
            });
        </script>
    @endif
@endsection
