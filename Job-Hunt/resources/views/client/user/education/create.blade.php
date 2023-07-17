@extends('client.layout.app')
@section('title', 'Create User Education')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Create User Education</h2>
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
                <a href="{{ route('user.education') }}" class="btn btn-primary btn-sm mb-2"><i class="fas  fa-plus"></i> See All</a>
                <div class="card"
                        style="margin: 10px auto; padding: 10px 20px 10px 20px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('user.education-store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Education Level *</label>
                            <div class="form-group">
                                <input type="text" name="level" class="form-control @error('level') is-invalid @enderror" value="{{ old('level') }}">
                                @error('level')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Institute *</label>
                            <div class="form-group">
                                <input type="text" name="institute" class="form-control @error('institute') is-invalid @enderror" value="{{ old('institute') }}">
                                @error('institute')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Degree *</label>
                            <div class="form-group">
                                <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" value="{{ old('degree') }}">
                                @error('degree')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Passing Year *</label>
                            <div class="form-group">
                                <input type="text" name="passing_year" class="form-control @error('passing_year') is-invalid @enderror" value="{{ old('passing_year') }}">
                                @error('passing_year')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
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