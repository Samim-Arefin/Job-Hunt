<a href="{{ route('home') }}">Home</a> - 

@if(Auth::guard('web')->user())
<a href="{{ route('authentication.dashboard') }}">Dashboard</a> - 
<a href="{{ route('authentication.logout') }}">Logout</a>
@endif

@if(!Auth::guard('web')->user())
<a href="{{ route('authentication.login') }}">Login</a> - 
<a href="{{ route('authentication.registration') }}">Registration</a> - 
@endif