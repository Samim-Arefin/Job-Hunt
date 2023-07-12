@extends('client.layout.app') 
@section('title', 'Current Plan') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Current Plan</h2>
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
            <div class="col-lg-9 col-md-12">
                <div class="row box-items mb-4">
                    <div class="col-md-4">
                        <h4 class="p-2" style="background:aquamarine;color:brown">Current Plan</h4>
                        <div class="box1">
                            @if($current_plan == null)
                            <h3><span class="text-danger">No plan is available</span></h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('pricing') }}" class="btn btn-success">Buy a Plan</a>
                            </div>
                            @else
                            <h4>{{ $current_plan->rPackage->name }}</h4>
                            <p>{{ $current_plan->rPackage->price }} BDT</p>
                            <p>
                            @php
                                $currentDate = new DateTime();
                                $targetDate = new DateTime($current_plan->ending_date);
                                $interval = $currentDate->diff($targetDate);
                                $remainingDays = $interval->days; 
                            @endphp
                            Expire in {{ $remainingDays }} days
                            </p>
                            <div class="d-flex justify-content-end">
                                 <form action="{{ route('company.cancel-plan', Auth::guard('company')->user()->id) }}" method="POST">
                                    @csrf
                                    <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger btn-sm">Cancel Plan</button>
                                </form>
                            </div>
                            @endif
                        </div>
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
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@endsection