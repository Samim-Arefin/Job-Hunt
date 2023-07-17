@extends('client.layout.app')
@section('title', 'Edit User Work Experience')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Edit User Work Experience</h2>
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
                <a href="{{ route('user.work-experience') }}" class="btn btn-primary btn-sm mb-2"><i class="fas  fa-plus"></i> See All</a>
                <div class="card"
                        style="margin: 10px auto; padding: 10px 20px 10px 20px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('user.work-experience-update', $work_experience->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Company Name *</label>
                            <div class="form-group">
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ $work_experience->company_name }}">
                                 @error('company_name')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Designation *</label>
                            <div class="form-group">
                                <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $work_experience->designation }}">
                                 @error('designation')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Start Date *</label>
                            <div class="form-group">
                                <input type="text" name="starting_date" class="form-control @error('starting_date') is-invalid @enderror" value="{{ $work_experience->starting_date }}">
                                 @error('starting_date')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">End Date *</label>
                            <div class="form-group">
                                <input type="text" name="ending_date" class="form-control @error('ending_date') is-invalid @enderror" value="{{ $work_experience->ending_date }}">
                                 @error('ending_date')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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