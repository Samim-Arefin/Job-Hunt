@extends('admin.layout.app')

@section('heading', 'Create Package')

@section('button')
<div>
    <a href="{{ route('admin.package') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.package-store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Basic">
                                    @error('name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Price *</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="19">
                                    @error('price')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Number of Days *</label>
                                    <input type="text" class="form-control @error('days') is-invalid @enderror" name="days" value="{{ old('days') }}" placeholder="14">
                                    @error('days')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Time *</label>
                                    <input type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" placeholder="2 Week">
                                    @error('time')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Jobs *</label>
                                    <input type="text" class="form-control @error('total_allowed_jobs') is-invalid @enderror" name="total_allowed_jobs" value="{{ old('total_allowed_jobs') }}" placeholder="10">
                                     @error('total_allowed_jobs')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Featured Jobs *</label>
                                    <input type="text" class="form-control @error('total_allowed_featured_jobs') is-invalid @enderror" name="total_allowed_featured_jobs" value="{{ old('total_allowed_featured_jobs') }}" placeholder="0">
                                     @error('total_allowed_featured_jobs')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Photos *</label>
                                    <input type="text" class="form-control @error('total_allowed_photos') is-invalid @enderror" name="total_allowed_photos" value="{{ old('total_allowed_photos') }}" placeholder="0">
                                     @error('total_allowed_photos')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection