<div class="navbar-area" id="stickymenu">
   <!-- Menu For Mobile Device -->
   <div class="mobile-nav">
      <a href="{{ route('home') }}" class="logo">
      <img src="{{ asset('uploads/logo.png') }}" alt="" />
      </a>
   </div>
   <!-- Menu For Desktop Device -->
   <div class="main-nav">
      <div class="container">
         <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('uploads/logo.png') }}" alt="" />
            </a>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                     <a href="{{ route('home') }}" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item {{ Request::is('job-listing') || Request::is('job/*') ? 'active' : '' }}">
                     <a href="{{ route('job-listing') }}" class="nav-link">Find Jobs</a>
                  </li>
                  <li class="nav-item {{ Request::is('company-listing') || Request::is('companylisting/*') ? 'active' : '' }}">
                     <a href="{{ route('company-listing') }}" class="nav-link">Companies</a>
                  </li>
                  <li class="nav-item {{ Request::is('pricing') ? 'active' : '' }}">
                     <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
                  </li>
                  <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                     <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
   </div>
</div>