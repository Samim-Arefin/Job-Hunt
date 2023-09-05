@extends('client.layout.app')
@section('main-section')

<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Apply for: "{{ $job_single->title }}"</h2>
                <div class="button">
                    <a href="{{ route('job',$job_single->id) }}" class="btn btn-primary btn-sm">See Job Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-apply">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="apply-form">
                    <form action="{{ route('user.apply-submit',$job_single->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-1">Cover Letter *</label>
                            <textarea class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter" rows="3"></textarea>
                            @error('cover_letter')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Confirm Apply
                            </button>
                        </div>
                    </form>
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

@endsection