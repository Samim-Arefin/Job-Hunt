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
                            <li class="email-text">admin@jobhunt.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            <li class="menu">
                                <a href="#"
                                    ><i class="fas fa-sign-in-alt"></i> Login</a
                                >
                            </li>
                            <li class="#">
                                <a href="#"
                                    ><i class="fas fa-user"></i> Sign Up</a
                                >
                            </li>
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
                            <h2 class="heading">For Candidates</h2>
                            <ul class="useful-links">
                                <li><a href="">Browser Jobs</a></li>
                                <li><a href="">Browse Candidates</a></li>
                                <li><a href="">Candidate Dashboard</a></li>
                                <li><a href="">Saved Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Companies</h2>
                            <ul class="useful-links">
                                <li><a href="">Post Job</a></li>
                                <li><a href="">Browse Jobs</a></li>
                                <li><a href="">Company Dashboard</a></li>
                                <li><a href="">Applications</a></li>
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
                                <div class="right">admin@jobhunt.com</div>
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name=""
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Subscribe Now"
                                    />
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
                                    <a href="#">Privacy Policy</a>
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
    </body>
</html>
