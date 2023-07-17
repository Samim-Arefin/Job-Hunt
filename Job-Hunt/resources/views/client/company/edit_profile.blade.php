@extends('client.layout.app')
@section('title', 'Company Edit Profile')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">Company Edit Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        @include('client.company.sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card"
                        style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                        <div class="card-body">
                            <form action="{{ route('company.edit-profile-submit') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Existing Logo</label>
                                        <div class="form-group">
                                            @if (Auth::guard('company')->user()->logo == '')
                                                <img src="{{ asset('uploads/default_company_logo.jpg') }}" alt=""
                                                    class="logo">
                                            @else
                                                <img src="{{ asset('uploads/' . Auth::guard('company')->user()->logo) }}"
                                                    alt="" class="logo">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Change Logo</label>
                                        <div class="form-group">
                                            <input type="file" name="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Company Name *</label>
                                        <div class="form-group">
                                            <input type="text" name="name"
                                                class="form-control form-control @error('name') is-invalid @enderror"
                                                value="{{ Auth::guard('company')->user()->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Email *</label>
                                        <div class="form-group">
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ Auth::guard('company')->user()->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Phone</label>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ Auth::guard('company')->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Address</label>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ Auth::guard('company')->user()->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Company Location
                                            *</label>
                                        <div class="form-group">
                                            <select name="company_location_id" class="form-control select2">
                                                @foreach ($company_locations as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == Auth::guard('company')->user()->company_location_id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Company Industry
                                            *</label>
                                        <div class="form-group">
                                            <select name="company_industry_id" class="form-control select2">
                                                @foreach ($company_industries as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == Auth::guard('company')->user()->company_industry_id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Company Size *</label>
                                        <div class="form-group">
                                            <select name="company_size_id" class="form-control select2">
                                                @foreach ($company_sizes as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == Auth::guard('company')->user()->company_size_id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Founded On *</label>
                                        <div class="form-group">
                                            <select name="founded_on" class="form-control select2">
                                                @for ($i = 1980; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}"
                                                        @if ($i == Auth::guard('company')->user()->founded_on) selected @endif>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Website</label>
                                        <div class="form-group">
                                            <input type="text" name="website" class="form-control"
                                                value="{{ Auth::guard('company')->user()->website }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">About Company</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ Auth::guard('company')->user()->description }}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Opening Hour
                                            (Monday)</label>
                                        <div class="form-group">
                                            <input type="text" name="mon" class="form-control"
                                                value="{{ Auth::guard('company')->user()->mon }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Opening Hour
                                            (Tuesday)</label>
                                        <div class="form-group">
                                            <input type="text" name="tue" class="form-control"
                                                value="{{ Auth::guard('company')->user()->tue }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Opening Hour
                                            (Wednesday)</label>
                                        <div class="form-group">
                                            <input type="text" name="wed" class="form-control"
                                                value="{{ Auth::guard('company')->user()->wed }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Opening Hour
                                            (Thursday)</label>
                                        <div class="form-group">
                                            <input type="text" name="thu" class="form-control"
                                                value="{{ Auth::guard('company')->user()->thu }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Opening Hour
                                            (Friday)</label>
                                        <div class="form-group">
                                            <input type="text" name="fri" class="form-control"
                                                value="{{ Auth::guard('company')->user()->fri }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Location Map (Google
                                            Map Code)</label>
                                        <div class="form-group">
                                           <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ Auth::guard('company')->user()->map_code }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Facebook</label>
                                        <div class="form-group">
                                            <input type="text" name="facebook" class="form-control"
                                                value="{{ Auth::guard('company')->user()->facebook }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Twitter</label>
                                        <div class="form-group">
                                            <input type="text" name="twitter" class="form-control"
                                                value="{{ Auth::guard('company')->user()->twitter }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Linkedin</label>
                                        <div class="form-group">
                                            <input type="text" name="linkedin" class="form-control"
                                                value="{{ Auth::guard('company')->user()->linkedin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label style="font-weight: 600; color: #555;" for="">Instagram</label>
                                        <div class="form-group">
                                            <input type="text" name="instagram" class="form-control"
                                                value="{{ Auth::guard('company')->user()->instagram }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->get('success'))
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
