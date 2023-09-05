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
        <a style="color:black" href="{{ Route('user.dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item nav-item" style="{{ Request::is('user/applications') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('user.applications') }}">Applied Jobs</a>
    </li>
    <li class="list-group-item nav-item" style="{{ Request::is('user/bookmark-view') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('user.bookmark-view') }}">Bookmarks</a>
    </li>
    <li class="list-group-item nav-item" style ="{{ Request::is('user/education/view') ||  Request::is('user/education/create') || Request::is('user/education/edit/*') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ route('user.education') }}">Educations</a>
    </li>
    <li class="list-group-item nav-item" style ="{{ Request::is('user/skill/view') ||  Request::is('user/skill/create') || Request::is('user/skill/edit/*') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ route('user.skill') }}">Skills</a>
    </li>
    <li class="list-group-item nav-item" style ="{{ Request::is('user/work-experience/view') ||  Request::is('user/work-experience/create') || Request::is('user/work-experience/edit/*') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ route('user.work-experience') }}">Work Experiences</a>
    </li>
    <li class="list-group-item nav-item" style ="{{ Request::is('user/award/view') ||  Request::is('user/award/create') || Request::is('user/award/edit/*') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ route('user.award') }}">Awards</a>
    </li>
    <li class="list-group-item nav-item" style ="{{ Request::is('user/resume/view') ||  Request::is('user/resume/create') || Request::is('user/resume/edit/*') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ route('user.resume') }}">Resumes</a>
    </li>
    <li class="list-group-item nav-item" style="{{ Request::is('user/edit-profile') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('user.edit-profile') }}">Edit Profile</a>
    </li>
    <li class="list-group-item nav-item" style="{{ Request::is('user/edit-password') ? 'background-color: darkcyan;' : '' }}">
        <a style="color:black" href="{{ Route('user.edit-password') }}">Edit Password</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('auth.user-logout') }}">Logout</a>
    </li>
</ul>
</body>
</html>