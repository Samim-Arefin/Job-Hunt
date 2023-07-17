@extends('client.layout.app') 
@section('title', 'Edit Job') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Edit Job</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                      @include('client.company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
               <div class="card"
                        style="margin: 10px auto; padding: 40px 30px 20px 30px; background-color: #e9eff3; border-radius: 15px;">
                <div class="card-body">
                <form action="{{ route('company.update-job', $job->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Title" class="form-label">Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $job->title }}">
                            @error('title')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description *</label>
                        <textarea name="description" class="form-control editor @error('description') is-invalid @enderror" cols="30" rows="10">{{ $job->description }}</textarea>
                        @error('description')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Job Responsibilities" class="form-label">Job Responsibilities</label>
                            <textarea name="responsibility" class="form-control editor" cols="30" rows="10">{{ $job->responsibility }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Skills and Abilities" class="form-label">Skills and Abilities</label>
                            <textarea name="skill" class="form-control editor" cols="30" rows="10">{{ $job->skill }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Educational Qualification" class="form-label">Educational Qualification</label>
                            <textarea name="education" class="form-control editor" cols="30" rows="10">{{ $job->education }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Benefits" class="form-label">Benifits</label>
                            <textarea name="benefit" class="form-control editor" cols="30" rows="10">{{ $job->benefit }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Deadline" class="form-label">Deadline *</label>
                            <input type="text" name="deadline" class="form-control datepicker @error('deadline') is-invalid @enderror" value="{{ $job->deadline }}">
                            @error('deadline')
                             <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Vacancy" class="form-label">Vacancy *</label>
                            <input type="number" class="form-control @error('vacancy') is-invalid @enderror" name="vacancy" min="1" value="{{ $job->vacancy }}">
                            @error('vacancy')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Job Category" class="form-label">Job Category *</label>
                            <select name="job_category_id" class="form-control select2">
                                @foreach($job_categories as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $job->job_category_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Location" class="form-label">Location *</label>
                            <select name="job_location_id" class="form-control select2">
                                @foreach($job_locations as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $job->job_location_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Job Type" class="form-label">Job Type *</label>
                            <select name="job_type_id" class="form-control select2">
                                @foreach($job_types as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $job->job_type_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Experience" class="form-label">Experience *</label>
                            <select name="job_experience_id" class="form-control select2">
                                @foreach($job_experiences as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $job->job_experience_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Gender" class="form-label">Gender *</label>
                            <select name="job_gender_id" class="form-control select2">
                                @foreach($job_genders as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $job->job_gender_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Salary Range" class="form-label">Salary Range *</label>
                            <select name="job_salary_range_id" class="form-control select2">
                                @foreach($job_salary_ranges as $item)
                                <option value="{{ $item->id }}"  @if ($item->id == $job->job_salary_range_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Location Map" class="form-label">Location Map</label>
                            <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ $job->map_code }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Is Featured" class="form-label">Is Featured?</label>
                            <select name="is_featured" class="form-control select2">
                                <option value="0" @if ($job->is_featured == 0) selected @endif>No</option>
                                <option value="1" @if ($job->is_featured == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Is Urgent" class="form-label">Is Urgent?</label>
                            <select name="is_urgent" class="form-control select2">
                                <option value="0" @if ($job->is_urgent == 0) selected @endif>No</option>
                                <option value="1" @if ($job->is_urgent == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection