@extends('admin.layout.app')

@section('heading', 'Create Testimonial')

@section('button')
<div>
    <a href="{{ route('admin.testimonial') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.testimonial-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Samim Arefin">
                            @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation *</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" placeholder="Junior Web Developer">
                            @error('designation')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment *</label>
                            <textarea name="comment" class="form-control h_100 @error('comment') is-invalid @enderror" cols="30" rows="10" value="{{ old('comment') }}" placeholder="No Comment"></textarea>
                            @error('comment')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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