@include('nav')

<h3>Forget Password</h3>

<form action="{{ route('authentication.forget-password-submit') }}" method="post">
    @csrf
    <div>Email Address</div>
    <div>
        <input type="text" name="email" value="{{ old('email') }}">
         @error('email')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <div style="margin-top:10px;">
        <input type="submit" value="Submit">
        <br>
        <a href="{{ route('authentication.login') }}">Back to Login Page</a>
    </div>
</form>