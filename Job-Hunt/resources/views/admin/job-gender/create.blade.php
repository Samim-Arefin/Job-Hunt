@extends('admin.layout.app')

@section('heading', 'Create Job Gender')

@section('button')
<div>
    <a href="{{ route('admin.job-gender') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.job-gender-store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Male">
                            @error('name')
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