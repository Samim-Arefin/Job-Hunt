@include('nav')

<h3>Registration</h3>

<form action="{{ route('authentication.registration_submit') }}" method="post">
    @csrf
    <div>Name</div>
    <div>
        <input type="text" name="name" value="{{ old('name') }}">
         @error('name')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
    </div>

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

    <div style="margin-top:10px;"><input type="submit" value="Make Registration"></div>
</form>