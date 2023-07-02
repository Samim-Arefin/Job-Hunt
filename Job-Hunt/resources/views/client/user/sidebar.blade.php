<!DOCTYPE html>
<html lang="en">
<head>
    <style>
      .active{
        background-color: rebeccapurple;
      }
    </style>
</head>
<body>
<ul class="list-group list-group-flush">
    <li class="list-group-item nav-item" style="{{ Request::is('user/dashboard') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:white" href="{{ Route('user.dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('auth.user-logout') }}">Logout</a>
    </li>
</ul>
</body>
</html>