@extends('client.layout.app') 
@section('title', 'Sign Up') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">User Sign Up</h2>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 2rem 0 2rem 0;">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="card" style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                    <form action="{{ route('auth.user-signup-submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label style="margin-left: 1rem; font-weight: 600; color: #555;" for="Name" class="form-label">User Name</label>
                            <input
                                style="border-radius: 20px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                placeholder="Samim Arefin"
                                value="{{ old('name') }}"
                            />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label style="margin-left: 1rem; font-weight: 600; color: #555;" for="Email" class="form-label">User Email</label>
                            <input
                                style="border-radius: 20px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;"
                                type="text"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                placeholder="samimarefin@gmail.com"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="mt-2 mb-3 btn btn-primary bg-website" style="width: 100%; border-radius: 20px;">
                                Sign Up
                            </button>
                            <a href="{{ route('auth.user-login') }}" style="color: #03a9f4;">Existing User? Login Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
