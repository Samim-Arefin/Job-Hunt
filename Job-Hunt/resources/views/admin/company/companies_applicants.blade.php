@extends('admin.layout.app')

@section('heading', 'Applicants for Job: '.$job_detail->title)

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
                                <th class="px-3" style="text-align:center;">Name</th>
                                <th class="px-3" style="text-align:center;">Email</th>
                                <th class="px-3" style="text-align:center;">Phone</th>
                                <th class="px-3" style="text-align:center;">Status</th>
                                <th class="px-3" style="text-align:center;">Cover Letter</th>
                                <th class="px-3" style="text-align:center;">Detail</th>
                            </tr>
                            
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($applicants as $item)
                                @php $i++; @endphp
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td style="text-align:center;">{{ $item->rUser->name }}</td>
                                    <td style="text-align:center;">{{ $item->rUser->email }}</td>
                                    <td style="text-align:center;">{{ $item->rUser->phone }}</td>
                                    <td style="text-align:center;">
                                        @if($item->status == 'Applied')
                                            @php $color="primary"; @endphp
                                        @elseif($item->status == 'Approved')
                                            @php $color="success"; @endphp
                                        @elseif($item->status == 'Rejected')
                                            @php $color="danger"; @endphp
                                        @endif
                                        <span class="badge bg-{{ $color }}">{{ $item->status }}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i }}">Cover Letter</a>

                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cover Letter</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! nl2br($item->cover_letter) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route('admin.companies-applicant-resume',$item->user_id) }}" style="text-decoration: none" class="badge bg-primary text-white" target="_blank">Detail</a>
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