@extends('client.layout.app')
@section('title', 'Home')
@section('main-section')
    
     <div class="slider" style="background-image: url({{ asset('uploads/'.$page_home_data->background) }})">
   <div class="bg"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="item">
               <div class="text">
                  <h2 style="font-wight:700;color:#75e9fd">{{ $page_home_data->heading }}</h2>
                  <p style="color:#3ef29e">
                     {!! $page_home_data->text !!}
                  </p>
               </div>
               <div class="search-section">
                  <form action="#" method="post">
                     <div class="inner">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <input
                                    type="text"
                                    name=""
                                    class="form-control"
                                    placeholder="{{ $page_home_data->job_title }}"
                                    />
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select
                                    name=""
                                    class="form-select select2"
                                    >
                                    <option value="">
                                       {{ $page_home_data->job_location }}
                                    </option>
                                    <option value="">
                                       Australia
                                    </option>
                                    <option value="">
                                       Bangladesh
                                    </option>
                                    <option value="">
                                       Canada
                                    </option>
                                    <option value="">
                                       China
                                    </option>
                                    <option value="">
                                       India
                                    </option>
                                    <option value="">
                                       United Kingdom
                                    </option>
                                    <option value="">
                                       United States
                                    </option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select
                                    name=""
                                    class="form-select select2"
                                    >
                                    <option value="">
                                       {{ $page_home_data->job_category }}
                                    </option>
                                    @foreach ($job_categories as $job_category)
                                        <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <button
                                 type="submit"
                                 class="btn btn-primary"
                                 >
                              <i
                                 class="fas fa-search"
                                 ></i>
                              {{ $page_home_data->search }}
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if ($page_home_data->job_category_status =='Show')
    <div class="job-category">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="heading">
               <h2>{{ $page_home_data->job_category_heading }}</h2>
               <p>
                  {{ $page_home_data->job_category_subheading }}
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach ($job_categories as $category)
         @if ( $loop->iteration <= 6)
         <div class="col-md-4">
            <div class="item">
               <div class="icon">
                  <i class="{{ $category->icon }}"></i>
               </div>
               <h3>{{ $category->name }}</h3>
               <p>(5 Open Positions)</p>
               <a href=""></a>
            </div>
         </div>
         @endif
         @endforeach
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="all">
               <a href="{{ route('job-categories') }}" class="btn btn-primary"
                  >See All Categories</a
                  >
            </div>
         </div>
      </div>
   </div>
</div>
@endif

@if ($page_home_data->why_choose_status == 'Show')
    <div
   class="why-choose"
   style="background-image: url({{ asset('uploads/'.$page_home_data->why_choose_background) }})"
   >
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="heading">
               <h2>{{ $page_home_data->why_choose_heading }}</h2>
               <p>
                   {{ $page_home_data->why_choose_subheading }}
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach ($why_choose_items as $why_choose_item)
         <div class="col-md-4">
            <div class="inner">
               <div class="icon">
                  <i class="{{ $why_choose_item->icon }}"></i>
               </div>
               <div class="text">
                  <h2>{{ $why_choose_item->heading }}</h2>
                  <p>
                     {{ $why_choose_item->text }}
                  </p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
@endif

@if ($page_home_data->featured_jobs_status == 'Show')
    <div class="job">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="heading">
               <h2>{{ $page_home_data->featured_jobs_heading }}</h2>
               <p>{{ $page_home_data->featured_jobs_subheading }}</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo1.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#"
                        >Software Engineer, Google</a
                        >
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Web Development</div>
                     <div class="location">United States</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">3 days ago</div>
                     <div class="budget">$300-$600</div>
                     <div class="expired">Expired</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Full Time</div>
                     <div class="urgent">Urgent</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark active"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo2.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#">Web Designer, Amplify</a>
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Web Development</div>
                     <div class="location">United States</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">1 day ago</div>
                     <div class="budget">$1000</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Part Time</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo3.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#"
                        >Laravel Developer, Gimpo</a
                        >
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Web Development</div>
                     <div class="location">Canada</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">2 days ago</div>
                     <div class="budget">$1000-$3000</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Full Time</div>
                     <div class="urgent">Urgent</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo4.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#"
                        >PHP Developer, Kite Solution</a
                        >
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Web Development</div>
                     <div class="location">Australia</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">7 hours ago</div>
                     <div class="budget">$1800</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Full Time</div>
                     <div class="urgent">Urgent</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo5.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#"
                        >Junior Accountant, ABC Media</a
                        >
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Marketing</div>
                     <div class="location">Canada</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">2 hours ago</div>
                     <div class="budget">$400</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Part Time</div>
                     <div class="urgent">Urgent</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="item d-flex justify-content-start">
               <div class="logo">
                  <img src="{{ asset('uploads/logo6.png') }}" alt="" />
               </div>
               <div class="text">
                  <h3>
                     <a href="#"
                        >Sales Manager, Tingshu Limited</a
                        >
                  </h3>
                  <div
                     class="detail-1 d-flex justify-content-start"
                     >
                     <div class="category">Marketing</div>
                     <div class="location">Canada</div>
                  </div>
                  <div
                     class="detail-2 d-flex justify-content-start"
                     >
                     <div class="date">9 hours ago</div>
                     <div class="budget">$600-$800</div>
                  </div>
                  <div
                     class="special d-flex justify-content-start"
                     >
                     <div class="featured">Featured</div>
                     <div class="type">Full Time</div>
                     <div class="urgent">Urgent</div>
                  </div>
                  <div class="bookmark">
                     <a href=""
                        ><i class="fas fa-bookmark"></i
                        ></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="all">
               <a href="#" class="btn btn-primary"
                  >See All Jobs</a
                  >
            </div>
         </div>
      </div>
   </div>
</div>
@endif

@if ($page_home_data->testimonial_status == 'Show')
<div class="testimonial"
   style="background-image: url({{ asset('uploads/'.$page_home_data->testimonial_background) }})" >
   <div class="bg"></div>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="testimonial-carousel owl-carousel">
               @foreach ($testimonials as $testimonial)
                   <div class="item">
                  <div class="photo">
                     <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="" />
                  </div>
                  <div class="text">
                     <h4>{{ $testimonial->name }}</h4>
                     <p>{{ $testimonial->designation }}</p>
                  </div>
                  <div class="description">
                     <p>
                        {{ $testimonial->comment }}
                     </p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endif

@endsection