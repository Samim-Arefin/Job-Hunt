@extends('admin.layout.app')

@section('heading', 'Create Why Choose Us Item')

@section('button')
<div>
    <a href="{{ route('admin.why-choose-us') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.why-choose-us-store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading') }}" placeholder="Quick Apply" required>
                            @error('heading')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Text *</label>
                            <textarea name="text" class="form-control h_100 @error('text') is-invalid @enderror" cols="30" rows="10" value="{{ old('text') }}" placeholder="You can just create your account in our website and apply for desired job very quickly." required></textarea>
                            @error('text')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" placeholder="fas fa-briefcase" required>
                            @error('icon')
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