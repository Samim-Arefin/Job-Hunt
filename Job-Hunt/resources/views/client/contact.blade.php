@extends('client.layout.app')
@section('title', 'Privacy & Policy')

@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
     <div class="bg"></div>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h2 style="color:aliceblue">{{ $page_contact_data->heading }}</h2>
             </div>
         </div>
     </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card" style="background:azure;">
                  <div class="card-body" style="color:#062b37">
                    <form action="{{ route('contact-submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Samim Arefin">
                            @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email *</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="samimarefin@gmail.com">
                            @error('email')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="3" name="message" value="{{ old('message') }}" placeholder="No Message"></textarea>
                            @error('message')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!! $page_contact_data->map_code !!}
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
        });
    </script>
@endif
@endsection