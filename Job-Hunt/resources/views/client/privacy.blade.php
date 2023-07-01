@extends('client.layout.app')
@section('title', 'Privacy & Policy')

@section('main-section')
       <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="color:aliceblue">{{ $page_privacy_data->heading }}</h2>
                    </div>
                </div>
            </div>
      </div>
      <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $page_privacy_data->content !!}
                    </div>
                </div>
            </div>
        </div>
@endsection