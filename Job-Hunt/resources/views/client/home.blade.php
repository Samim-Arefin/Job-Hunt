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
                  <form action="{{ route('job-listing') }}" method="get">
                     @csrf
                     <div class="inner">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    placeholder="{{ $page_home_data->job_title }}"
                                    />
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select name="location" class="form-select select2">
                                    <option value="">
                                       {{ $page_home_data->job_location }}
                                    </option>
                                    @foreach ($job_locations as $job_location)
                                        <option value="{{ $job_location->id }}">{{ $job_location->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select name="category" class="form-select select2">
                                    <option value=""> {{ $page_home_data->job_category }}
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
               <p>({{ $category->r_job_count }} Open Positions)</p>
               <a href="{{ url('job-listing?category='.$category->id) }}"></a>
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
            @php $i=0; @endphp 
            @foreach($featured_jobs as $item)
            @php
            $this_company_id = $item->rCompany->id;
            $order_data = \App\Models\Order::where('company_id',$this_company_id)->where('currently_active',1)->first();
            if(date('Y-m-d') > $order_data->ending_date) {
                continue;
            }
            $i++;
            if($i>6) {
                break;
            }
            @endphp
            
            <div class="col-lg-6 col-md-12">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt="">
                    </div>
                    <div class="text">
                        <h3><a href="{{ route('job',$item->id) }}">{{ $item->title }}, {{ $item->rCompany->name }}</a></h3>
                        <div class="detail-1 d-flex justify-content-start">
                            <div class="category">
                                {{ $item->rJobCategory->name }}
                            </div>
                            <div class="location">
                                {{ $item->rJobLocation->name }}
                            </div>
                        </div>
                        <div class="detail-2 d-flex justify-content-start">
                            <div class="date">
                                {{ $item->created_at->diffForHumans() }}
                            </div>
                            <div class="budget">
                                {{ $item->rJobSalaryRange->name }}
                            </div>
                            @if(date('Y-m-d') > $item->deadline)
                            <div class="expired">
                                Expired
                            </div>
                            @endif
                        </div>
                        <div class="special d-flex justify-content-start">
                            @if($item->is_featured == 1)
                            <div class="featured">
                                Featured
                            </div>
                            @endif
                            <div class="type">
                                {{ $item->rJobType->name }}
                            </div>
                            @if($item->is_urgent == 1)
                            <div class="urgent">
                                Urgent
                            </div>
                            @endif
                        </div>
                        @if(!Auth::guard('company')->check())
                        <div class="bookmark">
                            @if(Auth::guard('user')->check())
                                @php
                                $count = \App\Models\UserBookmark::where('user_id',Auth::guard('user')->user()->id)->where('job_id',$item->id)->count();
                                if($count>0) {
                                    $bookmark_status = 'active';
                                } else {
                                    $bookmark_status = '';
                                }
                                @endphp
                            @else
                                @php $bookmark_status = ''; @endphp
                            @endif
                            <a href="{{ route('user.bookmark',$item->id) }}"><i class="fas fa-bookmark {{ $bookmark_status }}"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      <div class="row">
         <div class="col-md-12">
            <div class="all">
               <a href="{{ route('job-listing') }}" class="btn btn-primary"
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

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
            backgroundColor: 'green',
        });
    </script>
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@endsection