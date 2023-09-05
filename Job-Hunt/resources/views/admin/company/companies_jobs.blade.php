@extends('admin.layout.app')

@section('heading', 'Jobs of company: '.$companies_detail->name)

@section('button')
<div>
    <a href="{{ route('admin.companies') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back to Previous</a>
</div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Title</th>
                                <th class="px-3" style="text-align:center;">Category</th>
                                <th class="px-3" style="text-align:center;">Location</th>
                                <th class="px-3" style="text-align:center;">Is Featured?</th>
                                <th class="px-3" style="text-align:center;">Job Detail</th>
                                <th class="px-3" style="text-align:center;">Applicants</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($companies_jobs as $item)
                                <tr>
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
                                        <a href="{{ route('job',$item->id) }}" style="text-decoration: none" class="badge bg-primary text-white">Details</a>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route('admin.companies-applicants',$item->id) }}" style="text-decoration: none" class="badge bg-warning text-white">Applicants</a>
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
</div>
@endsection