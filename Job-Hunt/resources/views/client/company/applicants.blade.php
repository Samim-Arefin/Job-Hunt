@extends('client.layout.app') 
@section('title', 'Applicants') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Applicants of Job: {{ $job_single->title }}</h2>
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
                <h4>Applicants of this job:</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Name</th>
                                <th class="px-3" style="text-align:center;">Email</th>
                                <th class="px-3" style="text-align:center;">Phone</th>
                                <th class="px-3" style="text-align:center;">Status</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                                <th class="px-3" style="text-align:center;">Detail</th>
                                <th class="px-3" style="text-align:center;">Cover Letter</th>
                            </tr>

                            @php $i=0; @endphp
                            @foreach($applicants as $item)
                            @php $i++; @endphp 
                            <tr style="background:tr white; color:grey;font-weight:400;">
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
                                    <form action="{{ route('company.application-status-change') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job_single->id }}">
                                    <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                    <select name="status" class="form-control select2 w_100" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="Applied">Applied</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    </form>
                                </td>
                                <td style="text-align:center;">
                                    <a href="{{ route('company.applicant-resume',$item->user_id) }}" class="badge bg-primary text-white" target="_blank">Details</a>
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
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
                backgroundColor: 'green',
            });
        </script>
    @endif
@endsection