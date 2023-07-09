@extends('client.layout.app') 
@section('title', 'User Reset Password') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">User Reset Password</h2>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding: 2rem 0 2rem 0;">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="login-form">
                <div class="card" style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                    <div class="card-body">
                        <form action="{{ route('auth.user-reset-password-submit') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="mb-3">
                                <label style="margin-left: 1rem; font-weight: 600; color: #555;" for="Password" class="form-label">Password</label>
                                <input
                                    style="border-radius: 20px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="******"
                                />
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label style="margin-left: 1rem; font-weight: 600; color: #555;" for="Confirm Password" class="form-label">Confirm Password</label>
                                <input
                                    style="border-radius: 20px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;"
                                    type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    name="confirm_password"
                                    placeholder="******"
                                />
                                @error('confirm_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="mt-2 mb-3 btn btn-primary bg-website" style="width: 100%; border-radius: 20px;">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
