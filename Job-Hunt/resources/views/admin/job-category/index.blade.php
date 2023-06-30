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
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Category Icon</th>
                                <th>Icon Preview</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($job_categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->icon }}</td>
                                    <td>
                                        <i class="{{ $item->icon }}"></i>
                                    </td>
                                    <td class="pt_10 pb_10">
                                     <div class="d-flex gap-2">
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