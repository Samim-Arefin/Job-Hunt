@extends('admin.layout.app')

@section('heading', 'Job Categories')

@section('button')
<div>
    <a href="{{ route('admin.job-category-create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                <th class="px-3" style="text-align:center;">Category Name</th>
                                <th class="px-3" style="text-align:center;">Category Icon</th>
                                <th class="px-3" style="text-align:center;">Icon Preview</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($job_categories as $item)
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td style="text-align:center;">{{ $item->name }}</td>
                                    <td style="text-align:center;">{{ $item->icon }}</td>
                                    <td style="text-align:center;">
                                        <i class="{{ $item->icon }}"></i>
                                    </td>
                                    <td class="pt_10 pb_10">
                                     <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('admin.job-category-edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.job-category-delete', $item->id) }}" method="POST">
                                            @csrf
                                            <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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