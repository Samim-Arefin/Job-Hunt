@extends('client.layout.app') 
@section('title', 'Checkout') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Checkout</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
<div class="container bg-light p-4">
    <div class="row">
         <div class="col-lg-1 col-md-12"></div>
        <div class="mb-md-4 col-lg-5 col-md-12">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{ url('/pay') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="firstName">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Samim Arefin"
                               value="{{ old('name') }}">
                         @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="Mobile"
                               value="{{ old('mobile') }}">
                         @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
                   <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           placeholder="you@example.com" value="{{ old('email') }}">
                     @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                 <input type="hidden" name="package_id" value="{{ $package->id }}">
                <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Pay Now
                </button>
                </div>
            </form>
        </div>
        <div class="mt-md-6 col-lg-4 col-md-12">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Package Name</h6>
                    </div>
                    <span class="text-muted">{{ $package->name }}</span>
                </li>
                <li class="mt-3 list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $package->price }} TK</strong>
                </li>
            </ul>
        </div>
         <div class="col-lg-1 col-md-12">
        </div>
    </div>
</div>
</div>
@endsection
