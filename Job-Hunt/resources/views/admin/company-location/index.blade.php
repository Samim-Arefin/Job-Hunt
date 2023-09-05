@extends('admin.layout.app')

@section('heading', 'Company Locations')

@section('button')
<div>
    <a href="{{ route('admin.company-location-create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                <th class="px-3" style="text-align:center;">Company Location</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($company_locations as $item)
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td style="text-align:center;">{{ $item->name }}</td>
                                    <td class="pt_10 pb_10">
                                     <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('admin.company-location-edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Delete</button>
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
                                                            <form action="{{ route('admin.company-location-delete', $item->id) }}" method="POST">
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