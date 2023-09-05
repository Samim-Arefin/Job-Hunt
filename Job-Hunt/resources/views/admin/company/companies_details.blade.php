@extends('admin.layout.app')

@section('heading', 'Companies Details')

@section('button')
<div>
    <a href="{{ route('admin.companies') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back to Previous</a>
</div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="w_200">Logo</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$companies_detail->logo) }}" alt="" class="w_100">
                                </td>
                            </tr>
                            @if ($companies_detail->name != null)
                            <tr>
                                <th class="w_200">Company Name</th>
                                <td>{{ $companies_detail->name }}</td>
                            </tr>
                            @endif

                            @if ($companies_detail->email != null)
                            <tr>
                                <th class="w_200">Email</th>
                                <td>{{ $companies_detail->email }}</td>
                            </tr>
                            @endif
                            
                            @if ($companies_detail->phone != null)
                            <tr>
                                <th class="w_200">Phone</th>
                                <td>{{ $companies_detail->phone }}</td>
                            </tr>
                            @endif
                              
                            @if ($companies_detail->address != null)
                            <tr>
                                <th class="w_200">Address</th>
                                <td>{{ $companies_detail->address }}</td>
                            </tr>
                            @endif
                            
                            @if ($companies_detail->rCompanyIndustry->name != null)
                            <tr>
                                <th class="w_200">Industry</th>
                                <td>{{ $companies_detail->rCompanyIndustry->name }}</td>
                            </tr>
                            @endif
                            
                             @if ($companies_detail->rCompanyLocation->name != null)
                            <tr>
                                <th class="w_200">Location</th>
                                <td>{{ $companies_detail->rCompanyLocation->name }}</td>
                            </tr>
                             @endif
                           
                            @if ($companies_detail->rCompanySize->name != null)
                            <tr>
                                <th class="w_200">Size</th>
                                <td>{{ $companies_detail->rCompanySize->name }}</td>
                            </tr> 
                            @endif
                            
                            @if ($companies_detail->founded_on !=null )
                            <tr>
                                <th class="w_200">Founded On</th>
                                <td>{{ $companies_detail->founded_on }}</td>
                            </tr>
                            @endif
                            
                            @if ($companies_detail->website)
                             <tr>
                                <th class="w_200">Website</th>
                                <td>{{ $companies_detail->website }}</td>
                            </tr>
                            @endif

                           @if ($companies_detail->description != null)
                            <tr>
                                <th class="w_200">Description</th>
                                <td>{!! $companies_detail->description !!}</td>
                            </tr>
                           @endif
                            <tr>
                                <th class="w_200">Opening Hours</th>
                                <td>
                                    Monday: {{ $companies_detail->mon }}<br>
                                    Tuesday: {{ $companies_detail->tue }}<br>
                                    Wednesday: {{ $companies_detail->wed }}<br>
                                    Thursday: {{ $companies_detail->thu }}<br>
                                    Friday: {{ $companies_detail->fri }}<br>
                                </td>
                            </tr>

                            @if ($companies_detail->facebook != null)
                            <tr>
                                <th class="w_200">Facebook</th>
                                <td>{{ $companies_detail->facebook }}</td>
                            </tr>
                            @endif
                            

                            @if ($companies_detail->twitter != null)
                             <tr>
                                <th class="w_200">Twitter</th>
                                <td>{{ $companies_detail->twitter }}</td>
                            </tr>
                            @endif

                            @if ($companies_detail->linkedin != null)
                            <tr>
                                <th class="w_200">Linkedin</th>
                                <td>{{ $companies_detail->linkedin }}</td>
                            </tr>
                            @endif
                            

                            @if ( $companies_detail->instagram != null)
                            <tr>
                                <th class="w_200">Instagram</th>
                                <td>{{ $companies_detail->instagram }}</td>
                            </tr> 
                            @endif
                            
                            @if ($companies_detail->map_code != null)
                            <tr>
                                <th class="w_200">Google Map</th>
                                <td>{!! $companies_detail->map_code !!}</td>
                            </tr>
                            @endif
                            
                            <tr>
                                <th class="w_200">Photos</th>
                                <td>
                                    @foreach($photos as $item)
                                    <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_300">
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection