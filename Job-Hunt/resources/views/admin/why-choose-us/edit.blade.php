@extends('admin.layout.app')

@section('heading', 'Update Why Choose Us Item')

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
                    <form action="{{ route('admin.why-choose-us-update', $why_choose_item->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ $why_choose_item->heading }}" required>
                            @error('heading')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Text *</label>
                            <textarea name="text" class="text-nowrap form-control h_100  @error('text') is-invalid @enderror" cols="30" rows="10" required> {{ $why_choose_item->text }}</textarea>
                            @error('text')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $why_choose_item->icon }}" required>
                            @error('icon')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon Preview</label>
                            <div class="px-2">
                                <i class="{{ $why_choose_item->icon }}"></i>
                            </div>
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