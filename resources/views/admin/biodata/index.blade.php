@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Biodata</h3>
                    <div class="card-tools">
                        {{-- <a href="{{ URL::to('admin/category/create')}}" class="btn btn-tool">
                            <i class="fa fa-plus">&nbsp; Add</i>
                        </a> --}}
                    
                    </div>
                </div>
                
                <div class="card-body">
                    @if (Session::has('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth Date</th>
                                <th>Phone </th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($biodata as $biodata)
                            <tr>
                                <td class="text-center">{{ $biodata['id'] }}</td>
                                <td>{{ $biodata['first_name'] }}</td>
                                <td>{{ $biodata['last_name'] }}</td>
                                <td>{{ $biodata['birthdate'] }}</td>
                                <td>{{ $biodata['phone'] }}</td>
                                
                                
                                <td class="text-center">
                                    {{-- <form method="POST" action="{{ URL::to('/admin/category/'.$category['id']) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ URL::to('/admin/category/'.$category['id']) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success" href="{{ URL::to('/admin/category/'.$category['id'].'/edit') }}"><i class="fa fa-pencil"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection