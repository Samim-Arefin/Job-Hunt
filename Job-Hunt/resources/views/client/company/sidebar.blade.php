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
    <li class="list-group-item nav-item" style="{{ Request::is('company/dashboard') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('company.dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item nav-item" style="{{ Request::is('company/current-plan') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('company.current-plan') }}">Current Plan</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('auth.company-logout') }}">Logout</a>
    </li>
</ul>
</body>
</html>