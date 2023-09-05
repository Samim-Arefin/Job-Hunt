@extends('admin.layout.app')

@section('heading', 'User Details')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Basic Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="w_200">Photo</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$candidate_single->photo) }}" alt="" class="w_100">
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Name:</th>
                                <td>{{ $candidate_single->name }}</td>
                            </tr>
                            
                            @if($candidate_single->designation!=null)
                            <tr>
                                <th class="w_200">Designation:</th>
                                <td>{{ $candidate_single->designation }}</td>
                            </tr>
                            @endif

                            <tr>
                                <th class="w_200">Email:</th>
                                <td>{{ $candidate_single->email }}</td>
                            </tr>

                            @if($candidate_single->phone!=null)
                            <tr>
                                <th class="w_200">Phone:</th>
                                <td>{{ $candidate_single->phone }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->country!=null)
                            <tr>
                                <th class="w_200">Country:</th>
                                <td>{{ $candidate_single->country }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->address!=null)
                            <tr>
                                <th class="w_200">Address:</th>
                                <td>{{ $candidate_single->address }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->state!=null)
                            <tr>
                                <th class="w_200">State:</th>
                                <td>{{ $candidate_single->state }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->city!=null)
                            <tr>
                                <th class="w_200">City:</th>
                                <td>{{ $candidate_single->city }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->zipcode!=null)
                            <tr>
                                <th class="w_200">Zip Code:</th>
                                <td>{{ $candidate_single->zipcode }}</td>
                            </tr>
                            @endif
                            
                            @if($candidate_single->gender!=null)
                            <tr>
                                <th class="w_200">Gender:</th>
                                <td>{{ $candidate_single->gender }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->marital_status!=null)
                            <tr>
                                <th class="w_200">Marital Status:</th>
                                <td>{{ $candidate_single->marital_status }}</td>
                            </tr>
                            @endif

                            @if($candidate_single->dob!=null)
                            <tr>
                                <th class="w_200">Date of Birth:</th>
                                <td>{{ $candidate_single->dob }}</td>
                            </tr>
                            @endif
                            

                            @if($candidate_single->biography!=null)
                            <tr>
                                <th class="w_200">Biography:</th>
                                <td>
                                    {!! $candidate_single->biography !!}
                                </td>
                            </tr>
                            @endif
                         </table>
                    </div>

                    @if($candidate_educations->count())
                    <h5 class="resume mt-5">Education</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr style="background: rgb(43, 119, 119); color:rgb(237, 228, 228);font-weight:700;">
                                    <th class="px-3" style="text-align:center;">SL</th>
                                    <th class="px-3" style="text-align:center;">Education Level</th>
                                    <th class="px-3" style="text-align:center;">Institute</th>
                                    <th class="px-3" style="text-align:center;">Degree</th>
                                    <th class="px-3" style="text-align:center;">Passing Year</th>
                                </tr>
                                @foreach($candidate_educations as $item)
                                <tr>
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
                    <h5 class="resume mt-5">Skills</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered  table-sm">
                            <tbody>
                                <tr style="background: rgb(43, 119, 119); color:rgb(237, 228, 228);font-weight:700;">
                                    <th class="px-3" style="text-align:center;">SL</th>
                                    <th class="px-3" style="text-align:center;">Skill Name</th>
                                    <th class="px-3" style="text-align:center;">Level</th>
                                </tr>
                                @foreach($candidate_skills as $item)
                                <tr>
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
                    <h5 class="resume mt-5">Experience</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered  table-sm">
                            <tbody>
                                <tr style="background: rgb(43, 119, 119); color:rgb(237, 228, 228);font-weight:700;">
                                    <th class="px-3" style="text-align:center;">SL</th>
                                    <th class="px-3" style="text-align:center;">Company</th>
                                    <th class="px-3" style="text-align:center;">Designation</th>
                                    <th class="px-3" style="text-align:center;">Starting Date</th>
                                    <th class="px-3" style="text-align:center;">Ending Date</th>
                                </tr>
                                @foreach($candidate_experiences as $item)
                                <tr>
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
                    <h5 class="resume mt-5">Awards</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered  table-sm">
                            <tbody>
                                <tr style="background: rgb(43, 119, 119); color:rgb(237, 228, 228);font-weight:700;">
                                    <th class="px-3" style="text-align:center;">SL</th>
                                    <th class="px-3" style="text-align:center;">Title</th>
                                    <th class="px-3" style="text-align:center;">Description</th>
                                    <th class="px-3" style="text-align:center;" class="w-100">Date</th>
                                </tr>
                                @foreach($candidate_awards as $item)
                                <tr>
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
                    <h5 class="resume mt-5">Resume</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr style="background: rgb(43, 119, 119); color:rgb(237, 228, 228);font-weight:700;">
                                    <th class="px-3" style="text-align:center;">SL</th>
                                    <th class="px-3" style="text-align:center;">Name</th>
                                    <th class="px-3" style="text-align:center;">File</th>
                                </tr>
                                @foreach($candidate_resumes as $item)
                                <tr>
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
</div>
@endsection