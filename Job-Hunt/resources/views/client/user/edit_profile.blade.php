@extends('client.layout.app') 
@section('title', 'Edit User Profile') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Edit User Profile</h2>
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
                <div class="card"
                        style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('user.edit-profile-update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Photo</label>
                            <div class="form-group">
                                @if(Auth::guard('user')->user()->photo == '')
                                <img src="{{ asset('uploads/default_user.png') }}" alt="" class="user-photo">
                                @else
                                <img src="{{ asset('uploads/'.Auth::guard('user')->user()->photo) }}" alt="" class="user-photo">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Photo</label>
                            <div class="form-group">
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Name">Name *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::guard('user')->user()->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Designation</label>
                            <div class="form-group">
                                <input type="text" name="designation" class="form-control" value="{{ Auth::guard('user')->user()->designation }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Biography</label>
                            <textarea name="biography" class="form-control editor" cols="30" rows="10">{{ Auth::guard('user')->user()->biography }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::guard('user')->user()->email }}">
                                @error('email')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::guard('user')->user()->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ Auth::guard('user')->user()->country }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" value="{{ Auth::guard('user')->user()->address }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">State</label>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" value="{{ Auth::guard('user')->user()->state }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">City</label>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" value="{{ Auth::guard('user')->user()->city }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Zip Code</label>
                            <div class="form-group">
                                <input type="text" name="zipcode" class="form-control" value="{{ Auth::guard('user')->user()->zipcode }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Gender</label>
                            <div class="form-group">
                                <select name="gender" class="form-control select2">
                                    <option value="Male" @if(Auth::guard('user')->user()->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if(Auth::guard('user')->user()->gender == 'Female') selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Marital Status</label>
                            <div class="form-group">
                                <select name="marital_status" class="form-control select2">
                                    <option value="Unmarried" @if(Auth::guard('user')->user()->marital_status == 'Unmarried') selected @endif>Unmarried</option>
                                    <option value="Married" @if(Auth::guard('user')->user()->marital_status == 'Married') selected @endif>Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Date of Birth</label>
                            <div class="form-group">
                                <input type="text" name="dob" class="form-control datepicker" value="{{ Auth::guard('user')->user()->dob }}">
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