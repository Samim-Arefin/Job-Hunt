@extends('client.layout.app') 
@section('title', 'Candidate Resume') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Resume of "{{ $candidate_single->name }}"</h2>
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
               
                <h4 class="resume">Basic Profile</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="w-200">Photo:</th>
                            <td>
                                @if($candidate_single->photo=='')
                                <img src="{{ asset('uploads/default_candidate_photo.png') }}" alt="" class="w-100">
                                @else
                                <img src="{{ asset('uploads/'.$candidate_single->photo) }}" alt="" class="w-100">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $candidate_single->name }}</td>
                        </tr>
                        
                        @if($candidate_single->designation!=null)
                        <tr>
                            <th>Designation:</th>
                            <td>{{ $candidate_single->designation }}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>Email:</th>
                            <td>{{ $candidate_single->email }}</td>
                        </tr>

                        @if($candidate_single->phone!=null)
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $candidate_single->phone }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->country!=null)
                        <tr>
                            <th>Country:</th>
                            <td>{{ $candidate_single->country }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->address!=null)
                        <tr>
                            <th>Address:</th>
                            <td>{{ $candidate_single->address }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->state!=null)
                        <tr>
                            <th>State:</th>
                            <td>{{ $candidate_single->state }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->city!=null)
                        <tr>
                            <th>City:</th>
                            <td>{{ $candidate_single->city }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->zipcode!=null)
                        <tr>
                            <th>Zip Code:</th>
                            <td>{{ $candidate_single->zipcode }}</td>
                        </tr>
                        @endif
                        
                        @if($candidate_single->gender!=null)
                        <tr>
                            <th>Gender:</th>
                            <td>{{ $candidate_single->gender }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->marital_status!=null)
                        <tr>
                            <th>Marital Status:</th>
                            <td>{{ $candidate_single->marital_status }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->dob!=null)
                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{ $candidate_single->dob }}</td>
                        </tr>
                        @endif
                        

                        @if($candidate_single->biography!=null)
                        <tr>
                            <th>Biography:</th>
                            <td>
                                {!! $candidate_single->biography !!}
                            </td>
                        </tr>
                        @endif

                    </table>
                </div>

                @if($candidate_educations->count())
                <h4 class="resume mt-5">Education</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Education Level</th>
                                <th class="px-3" style="text-align:center;">Institute</th>
                                <th class="px-3" style="text-align:center;">Degree</th>
                                <th class="px-3" style="text-align:center;">Passing Year</th>
                            </tr>
                            @foreach($candidate_educations as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->level }}</td>
                                <td style="text-align:center;">{{ $item->institute }}</td>
                                <td style="text-align:center;">{{ $item->degree }}</td>
                                <td style="text-align:center;">{{ $item->passing_year }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($candidate_skills->count())
                <h4 class="resume mt-5">Skills</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Skill Name</th>
                                <th class="px-3" style="text-align:center;">Level</th>
                            </tr>
                            @foreach($candidate_skills as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->name }}</td>
                                <td style="text-align:center;">{{ $item->level }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif


                @if($candidate_experiences->count())
                <h4 class="resume mt-5">Experience</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Company</th>
                                <th class="px-3" style="text-align:center;">Designation</th>
                                <th class="px-3" style="text-align:center;">Starting Date</th>
                                <th class="px-3" style="text-align:center;">Ending Date</th>
                            </tr>
                            @foreach($candidate_experiences as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->company_name}}</td>
                                <td style="text-align:center;">{{ $item->designation }}</td>
                                <td style="text-align:center;">{{ $item->starting_date }}</td>
                                <td style="text-align:center;">{{ $item->ending_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif


                @if($candidate_awards->count())
                <h4 class="resume mt-5">Awards</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Title</th>
                                <th class="px-3" style="text-align:center;">Description</th>
                                <th class="px-3" style="text-align:center;" class="w-100">Date</th>
                            </tr>
                            @foreach($candidate_awards as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->title }}</td>
                                <td style="text-align:center;">{{ $item->description }}</td>
                                <td style="text-align:center;">{{ $item->date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif


                @if($candidate_resumes->count())
                <h4 class="resume mt-5">Resume</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Name</th>
                                <th class="px-3" style="text-align:center;">File</th>
                            </tr>
                            @foreach($candidate_resumes as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->name }}</td>
                                <td style="text-align:center;"><a href="{{ asset('uploads/'.$item->file) }}" target="_blank">{{ $item->file }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection