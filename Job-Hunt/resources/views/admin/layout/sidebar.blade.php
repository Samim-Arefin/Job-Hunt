<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.index') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.index') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page') || Request::is('admin/term-page') || Request::is('admin/privacy-page') ||  Request::is('admin/contact-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.home-page') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.term-page') }}"><i class="fas fa-angle-right"></i> Terms of Use</a></li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.privacy-page') }}"><i class="fas fa-angle-right"></i> Privacy & Policy</a></li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.contact-page') }}"><i class="fas fa-angle-right"></i>Contact</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/job-type/*') || Request::is('admin/job-location/*') || Request::is('admin/job-category/*') || Request::is('admin/job-experience/*') || Request::is('admin/job-gender/*') || Request::is('admin/job-salary-range/*') || Request::is('admin/company-location/*') || Request::is('admin/company-industry/*') || Request::is('admin/company-size/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-type') }}"><i class="fas fa-angle-right"></i>Job Types</a></li>
                    <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-location') }}"><i class="fas fa-angle-right"></i>Job Location</a></li>
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-category') }}"><i class="fas fa-angle-right"></i>Job Category</a></li>
                    <li class="{{ Request::is('admin/job-experience/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-experience') }}"><i class="fas fa-angle-right"></i>Job Experience</a></li>
                    <li class="{{ Request::is('admin/job-gender/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-gender') }}"><i class="fas fa-angle-right"></i>Job Gender</a></li>
                    <li class="{{ Request::is('admin/job-salary-range/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.job-salary-range') }}"><i class="fas fa-angle-right"></i>Job Salary Range</a></li>
                    <li class="{{ Request::is('admin/company-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company-location') }}"><i class="fas fa-angle-right"></i>Company Location</a></li>
                    <li class="{{ Request::is('admin/company-industry/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company-industry') }}"><i class="fas fa-angle-right"></i>Company Industry</a></li>
                    <li class="{{ Request::is('admin/company-size/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company-size') }}"><i class="fas fa-angle-right"></i>Company Size</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/why-choose-us/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.why-choose-us') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Us"><i class="fas fa-hand-point-right"></i> <span>Why Choose Us</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.testimonial') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonial"><i class="fas fa-hand-point-right"></i> <span>Testimonial</span></a></li>
            <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.package') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Packages"><i class="fas fa-hand-point-right"></i> <span>Packages</span></a></li>

        </ul>
    </aside>
</div>