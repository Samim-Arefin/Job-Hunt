@extends('client.layout.app')
@section('title', 'Edit User Award')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Edit User Award</h2>
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
                <a href="{{ route('user.award') }}" class="btn btn-primary btn-sm mb-2"><i class="fas  fa-plus"></i> See All</a>
                <div class="card"
                        style="margin: 10px auto; padding: 10px 20px 10px 20px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('user.award-update', $award->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Award Title *</label>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $award->title }}">
                                 @error('title')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Date *</label>
                            <div class="form-group">
                                <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $award->date }}">
                                @error('date')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Description *</label>
                            <div class="form-group">
                                <textarea name="description" class="form-control h-100 @error('description') is-invalid @enderror" cols="30" rows="10">{{ $award->description }}</textarea>
                                @error('description')
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