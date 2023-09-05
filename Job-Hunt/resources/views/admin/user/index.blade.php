@extends('admin.layout.app')

@section('heading', 'Users')

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
                                <th class="px-3" style="text-align:center;">Details</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td style="text-align:center;">{{ $item->name }}</td>
                                    <td style="text-align:center;">{{ $item->email }}</td>
                                    <td style="text-align:center;">{{ $item->phone }}</td>
                                    <td class="pt_10 pb_10">
                                      <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('admin.user-details',$item->id) }}" class="btn btn-primary btn-sm">User Details</a>
                                        <a href="{{ route('admin.user-applied-jobs',$item->id) }}" class="btn btn-warning btn-sm">Applied Jobs</a>
                                      </div>
                                    </td>
                                    <td class="pt_10 pb_10">
                                     <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Delete</button>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $item->name }} ?
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center gap-2 px-3 pb-3">
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <div>
                                                            <form action="{{ route('admin.user-delete',$item->id) }}" method="POST">
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