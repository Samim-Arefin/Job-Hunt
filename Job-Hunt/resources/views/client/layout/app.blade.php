<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />
        <title>@yield('title')</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png')}}" />
        
        @include('client.layout.styles')
          
        @include('client.layout.script')

        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet" />
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="email-text">jobhunt.web@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        
                        <ul class="right">
                            @if ((!Auth::guard('company')->check()) && (!Auth::guard('user')->check()))
                                <li class="menu nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Sign Up</a>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item" style="color:darkcyan;" href="{{ route('auth.user-signup') }}">User Sign Up</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" style="color:darkcyan;" href="{{ route('auth.company-signup') }}">Company Sign Up</a>
                                </div>
                            </li>
                            <li class="menu nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Login</a>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item" style="color:darkcyan;" href="{{ route('auth.user-login') }}">User Login</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" style="color:darkcyan;" href="{{ route('auth.company-login') }}">Company Login</a>
                                </div>
                            </li>
                            @else
                              @if (Auth::guard('company')->check())
                                <li class="menu">
                                    <a href="{{ route('company.dashboard') }}">
                                     <i class="fas fa-home"></i> Dashboard
                                    </a>
                                </li>
                              @else
                                <li class="menu">
                                    <a href="{{ route('user.dashboard') }}">
                                     <i class="fas fa-home"></i> Dashboard
                                    </a>
                                </li>
                              @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        @include('client.layout.nav')
      
        @yield('main-section')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Users</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('job-listing') }}">Browse Jobs</a></li>
                                <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
                                <li><a href="{{ route('user.bookmark-view') }}">Bookmarked Jobs</a></li>
                                <li><a href="{{ route('user.applications') }}">Applied Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Companies</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('company-listing') }}">Browse Companies</a></li>
                                <li><a href="{{ route('company.dashboard') }}">Company Dashboard</a></li>
                                <li><a href="{{ route('company.create-job') }}">Post New Job</a></li>
                                <li><a href="{{ route('company.applications') }}">User Applications</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    Pabna,Bangladesh
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">+8801719-358801</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">jobhunt.web@gmail.com</div>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-pinterest-p"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                To get the latest news from our website, please
                                subscribe us here:
                            </p>

                             <form action="{{ route('subscriber_send_email') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright">
                            Copyright 2023, JobHunt. All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="right">
                            <ul>
                                <li><a href="{{ route('terms') }}">Terms of Use</a></li>
                                <li>
                                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
      @include('client.layout.bottomtoupscript')
      <script>
        (function($){
            $(".form_subscribe_ajax").on('submit', function(e){
                e.preventDefault();
                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data)
                    {
                        if(data.code == 0)
                        {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }
                        else if(data.code == 2)
                        {
                            $.each(data.error_message_2, function(prefix, val) {
                                $('.email_error').text(data.error_message_2);
                            });
                        }
                        else if(data.code == 1)
                        {
                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topRight',
                                message: data.success_message,
                            });
                         }
        
                    }
                });
            });
        })(jQuery);
        </script>
    </body>
</html>
