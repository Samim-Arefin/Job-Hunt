@extends('admin.layout.app')

@section('heading', 'Home Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.home-page-update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row custom-tab">
                            <div class="col-lg-3 col-md-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical"> 

                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Search</button>

                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Job Category</button>

                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Why Choose Us</button>

                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Featured Jobs</button>

                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Testimonial</button>

                                    <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">SEO Section</button>

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                        <!-- Search Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ $page_home_data->heading }}">
                                                     @error('heading')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Text</label>
                                                    <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $page_home_data->text }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Job Title *</label>
                                                            <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ $page_home_data->job_title }}">
                                                             @error('job_title')
                                                              <div class="invalid-feedback">{{ $message }}</div>
                                                             @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Job Location *</label>
                                                            <input type="text" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ $page_home_data->job_location }}">
                                                            @error('job_location')
                                                             <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Job Category *</label>
                                                            <input type="text" class="form-control @error('job_category') is-invalid @enderror" name="job_category" value="{{ $page_home_data->job_category }}">
                                                        </div>
                                                        @error('job_category')
                                                         <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Search *</label>
                                                            <input type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ $page_home_data->search }}">
                                                        </div>
                                                        @error('search')
                                                         <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Existing Background *</label>
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$page_home_data->background) }}" alt="" class="w_300">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Background *</label>
                                                    <div>
                                                        <input type="file" class="form-control mt_10" name="background">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search Section End -->
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="1">
                                        <!-- Job Category Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control @error('job_category_heading') is-invalid @enderror" name="job_category_heading" value="{{ $page_home_data->job_category_heading }}">
                                                     @error('job_category_heading')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Sub Heading</label>
                                                    <textarea name="job_category_subheading" class="form-control h_100" cols="30" rows="10">{{ $page_home_data->job_category_subheading}}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Status *</label>
                                                            <select name="job_category_status" class="form-control @error('job_category_status') is-invalid @enderror">
                                                            <option value="Show" @if($page_home_data->job_category_status == 'Show') selected @endif>Show</option>
                                                            <option value="Hide" @if($page_home_data->job_category_status == 'Hide') selected @endif>Hide</option>
                                                            </select>
                                                             @error('job_category_status')
                                                              <div class="invalid-feedback">{{ $message }}</div>
                                                             @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Job Category Section End -->
                                    </div>

                                  <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="2">
                                        <!-- Why Choose Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control  @error('why_choose_heading') is-invalid @enderror" name="why_choose_heading" value="{{ $page_home_data->why_choose_heading }}">
                                                    @error('why_choose_heading')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Sub Heading</label>
                                                    <input type="text" class="form-control" name="why_choose_subheading" value="{{ $page_home_data->why_choose_subheading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Existing Background *</label>
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$page_home_data->why_choose_background) }}" alt="" class="w_300">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Background *</label>
                                                    <div>
                                                        <input type="file" class="form-control mt_10" name="why_choose_background">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="why_choose_status" class="form-control @error('why_choose_status') is-invalid @enderror">
                                                        <option value="Show" @if($page_home_data->why_choose_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($page_home_data->why_choose_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                    @error('why_choose_status')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Why Choose Section End -->
                                    </div>

                                  <!--Featured Jobs-->
                                  <!--Testimonial-->
                                  <!--SEO Section-->
                                  
                                </div>

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif
@endsection