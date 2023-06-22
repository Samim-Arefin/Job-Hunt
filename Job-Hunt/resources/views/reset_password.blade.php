@include('nav')

<h3>Forget Password</h3>

<form action="{{ route('authentication.reset-password-submit') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}" >
    <input type="hidden" name="email" value="{{ $email }}" >
    <div>New Password</div>
    <div>
        <input type="password" name="password">
         @error('password')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>

    <div style="margin-top:10px;">
        <input type="submit" value="Submit">
        <br>
        <a href="{{ route('authentication.login') }}">Back to Login Page</a>
    </div>
</form>