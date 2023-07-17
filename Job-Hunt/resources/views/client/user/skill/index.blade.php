@extends('client.layout.app')
@section('title', 'User Skills')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">User Skills</h2>
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
                <a href="{{ Route('user.skill-create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Add Item</a>
                
                @if(!$skills->count())
                    <div class="text-danger">No data found</div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Skill Name</th>
                                <th class="px-3" style="text-align:center;">Level</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            @foreach($skills as $item)
                            <tr style="background: white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->name }}</td>
                                <td style="text-align:center;">{{ $item->level }}</td>
                                <td class="pt_10 pb_10">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('user.skill-edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('user.skill-delete', $item->id) }}" method="POST">
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