@extends('client.layout.app') 
@section('title', 'Jobs') 
@section('main-section')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: aliceblue;">Jobs</h2>
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
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Title</th>
                                <th class="px-3" style="text-align:center;">Category</th>
                                <th class="px-3" style="text-align:center;">Location</th>
                                <th class="px-3" style="text-align:center;">Is Featured?</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>

                            @foreach($jobs as $item)
                            <tr style="background: white; color:grey;font-weight:400;">
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
                                <td class="pt_10 pb_10">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('company.edit-job', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Delete</button>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $item->title }} ?
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center gap-2 px-3 pb-3">
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <div>
                                                            <form action="{{ route('company.delete-job', $item->id) }}" method="POST">
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