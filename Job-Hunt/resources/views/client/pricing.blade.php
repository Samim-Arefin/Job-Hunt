@inject('convert', Rakibhstu\Banglanumber\NumberToBangla::class)
@extends('client.layout.app')
@section('title', 'Packages')

@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
     <div class="bg"></div>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h2 style="color:aliceblue">Packages</h2>
             </div>
         </div>
     </div>
</div>

<div class="page-content pricing">
    <div class="container">
        <div class="row pricing">
            @foreach($packages as $package)
            <div class="col-lg-4 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{ $package->name }}</h2>
                        <h3 class="card-price">
                         @php
                         $text = $convert->bnNum($package->price);
                         @endphp 
                         {{ $text }}৳
                        </h3>
                        <h4 class="card-day">({{ $package->time }})</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @php
                                    if($package->total_allowed_jobs == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $package->total_allowed_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li pricing-icon" style="@if($text=='No') color:red; @endif"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Job Post Allowed
                            </li>
                            <li>
                                @php
                                    if($package->total_allowed_featured_jobs == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $package->total_allowed_featured_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li pricing-icon" style="@if($text=='No') color:red; @endif"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Featured Job
                            </li>
                            <li>
                                @php
                                    if($package->total_allowed_photos == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $package->total_allowed_photos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li pricing-icon" style="@if($text=='No') color:red; @endif"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Company Photos
                            </li>
                            <li>
                                @php
                                    if($package->total_allowed_videos == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $package->total_allowed_videos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li pricing-icon" style="@if($text=='No') color:red; @endif"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Company Videos
                            </li>
                        </ul>
                        <div class="buy">
                            <a href ="{{ route('company.buy-package', $package) }}" class="btn btn-primary">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection