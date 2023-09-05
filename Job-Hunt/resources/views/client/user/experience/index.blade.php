@extends('client.layout.app')
@section('title', 'User Work Experiences')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">User Work Experiences</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('client.user.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <a href="{{ Route('user.work-experience-create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Add Item</a>
                
                @if(!$work_experiences->count())
                    <div class="text-danger">No data found</div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Company Name</th>
                                <th class="px-3" style="text-align:center;">Designation</th>
                                <th class="px-3" style="text-align:center;">Start Date</th>
                                <th class="px-3" style="text-align:center;">End Date</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            @foreach($work_experiences as $item)
                            <tr style="background: white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->company_name }}</td>
                                <td style="text-align:center;">{{ $item->designation }}</td>
                                <td style="text-align:center;">{{ $item->starting_date }}</td>
                                <td style="text-align:center;">{{ $item->ending_date }}</td>
                                <td class="pt_10 pb_10">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('user.work-experience-edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                       <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Delete</button>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $item->designation }} ?
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center gap-2 px-3 pb-3">
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <div>
                                                            <form action="{{ route('user.work-experience-delete', $item->id) }}" method="POST">
                                                            @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Delete</button>
                                                            </form>
                                                        </div>
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
                @endif
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