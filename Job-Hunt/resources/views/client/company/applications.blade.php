@extends('client.layout.app') 
@section('title', 'Candidate Applications') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Candidate Applications</h2>
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
                <h4>All Job Posts</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Title</th>
                                <th class="px-3" style="text-align:center;">Category</th>
                                <th class="px-3" style="text-align:center;">Location</th>
                                <th class="px-3" style="text-align:center;">Is Featured?</th>
                                <th class="px-3" style="text-align:center;">Job Detail</th>
                                <th class="px-3" style="text-align:center;">Applicants</th>
                            </tr>

                            @foreach($jobs as $item)
                            <tr style="background:tr white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->title }}</td>
                                <td style="text-align:center;">{{ $item->rJobCategory->name }}</td>
                                <td style="text-align:center;">{{ $item->rJobLocation->name }}</td>
                                <td style="text-align:center;">
                                    @if($item->is_featured == 1)
                                    <span class="badge bg-success">Featured</span>
                                    @else
                                    <span class="badge bg-danger">Not Featured</span>
                                    @endif
                                </td>
                                <td style="text-align:center;">
                                    <a href="{{ route('job',$item->id) }}" class="badge bg-primary text-white">Details</a>
                                </td>
                                <td style="text-align:center;">
                                    <a href="{{ route('company.applicant',$item->id) }}" class="badge bg-primary text-white">Applicants</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection