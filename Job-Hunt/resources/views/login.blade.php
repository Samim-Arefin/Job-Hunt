@include('nav')

<h3>Login</h3>

<form action="{{ route('authentication.login_submit') }}" method="post">
    @csrf
    <div>Email Address</div>
    <div>
        <input type="text" name="email" value="{{ old('email') }}">
         @error('email')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password">
         @error('password')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>
    
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif


    <div style="margin-top:10px;">
        <input type="submit" value="Login">
        <br>
        <a href="{{ route('authentication.forget_password') }}">Forget Password</a>
    </div>
</form>