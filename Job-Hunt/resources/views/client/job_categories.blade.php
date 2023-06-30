@extends('client.layout.app')


@section('main-section')
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Job Categories</h2>
            </div>
        </div>
    </div>
</div>

<div class="job-category">
    <div class="container">
        <div class="row">            
            @foreach($job_categories as $job_category)
            <div class="col-md-4">
                <div class="item">
                    <div class="icon">
                        <i class="{{ $job_category->icon }}"></i>
                    </div>
                    <h3>{{ $job_category->name }}</h3>
                    <p>5 Open Positions</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection