@extends('admin.layout.app')

@section('heading', 'Update Testimonial')

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
                    <form action="{{ route('admin.testimonial-update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $testimonial->name }}">
                            @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation *</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $testimonial->designation }}">
                            @error('designation')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment *</label>
                            <textarea name="comment" class="form-control h_100 @error('comment') is-invalid @enderror" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
                            @error('comment')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection