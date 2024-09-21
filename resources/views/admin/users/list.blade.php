@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
        </ol>
    </nav>

 <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users List</h4>
             
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Date</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value )
                                
                           
                            <tr class="table-info text-dark">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @if(!empty($value->photo))

                                  <img  style="border-radius: 100%; object-fit:cover;" width="150" height="150" src="{{ asset('upload/'.$value->photo) }}" />

                                  @endif
                                </td>
                                <td>
                                    @if($value->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $value->phone }}
                                </td>
                                <td>
                                    @if($value->role == 'admin')
                                    <span class="badge bg-info">Admin</span>
                                    @elseif($value->role == 'agent')
                                    <span class="badge bg-primary">Agent</span>
                                    @else
                                    <span class="badge bg-success">User</span>
                                    @endif
                                </td>
                                <td>
                                   {{ $value->address }}
                                </td>
                                <td>{{ $value->website }}</td>
                                <td ><span class="badge bg-dark">{{ date('d-m-y', strtotime($value->created_at)) }}</span> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
                <div style="padding: 20px; float:right; display:flex; flex-direction:row">
                    {{!! $getRecord->appends(Request::except('page'))->links() !!}}
                </div>
            </div>
        </div>
    </div>
   
</div>
</div>


@endsection