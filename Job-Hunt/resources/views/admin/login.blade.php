<h3>Admin Login</h3>

<form action="{{ route('admin.login_submit') }}" method="post">
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
    </div>
</form>