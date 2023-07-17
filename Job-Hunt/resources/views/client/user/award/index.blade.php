@extends('client.layout.app')
@section('title', 'User Awards')
@section('main-section')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color: aliceblue;">User Awards</h2>
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
                <a href="{{ Route('user.award-create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Add Item</a>
                
                @if(!$awards->count())
                    <div class="text-danger">No data found</div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background: azure; color:black;font-weight:700;">
                                <th class="px-3" style="text-align:center;">SL</th>
                                <th class="px-3" style="text-align:center;">Award Title</th>
                                <th class="px-3" style="text-align:center;">Description</th>
                                <th class="px-3" style="text-align:center;">Date</th>
                                <th class="px-3" style="text-align:center;">Action</th>
                            </tr>
                            @foreach($awards as $item)
                            <tr style="background: white; color:grey;font-weight:400;">
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $item->title }}</td>
                                <td style="text-align:center;">{{ $item->description }}</td>
                                <td style="text-align:center;">{{ $item->date }}</td>
                                <td class="pt_10 pb_10">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('user.award-edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('user.award-delete', $item->id) }}" method="POST">
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