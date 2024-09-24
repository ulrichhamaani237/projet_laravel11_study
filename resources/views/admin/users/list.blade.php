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
                    <div class="card-title">
                        seach Users
                    </div>
                    <form action="" class="form-control">
                        <div class="row">

                            <div class="col-sm-3">
                                <div class="mb-3 ">
                                    <label for="" class="form-label">id</label>
                                </div>
                                <input type="text" name="id" placeholder="Enter id" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                </div>
                                <input type="text" name="name" placeholder="Enter Name" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                </div>
                                <input type="text" name="username" placeholder="Enter userName" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <input type="text" name="email" placeholder="Enter Email" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">phone</label>
                                </div>
                                <input type="text" name="phone" placeholder="Enter phone number" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="website" class="form-label">website</label>
                                </div>
                                <input type="text" name="" placeholder="Enter website" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="role" class="form-label">role</label>
                                </div>
                                <select class="compose-multiple-select form-control" name="role">

                                    <option value="">
                                        select role
                                    </option>

                                    <option value="admin">
                                        admin
                                    </option>
                                    <option value="agent">
                                        agent
                                    </option>
                                    <option value="user">
                                        user
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">status</label>
                                </div>
                                <select class="compose-multiple-select form-control" name="status">

                                    <option value="">
                                        select status
                                    </option>

                                    <option value="active">
                                        active
                                    </option>

                                    <option value="inactive">
                                        inactive
                                    </option>
                                </select>
                            </div>

                        </div>


                        <a href="" class="btn btn-primary">
                            <b>Seach</b>
                        </a>

                        <a href="{{ url('admin/users') }}" class="btn btn-danger h3">Reset</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

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
                                    <th>Action</th>
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

                                        <img style="border-radius: 100%; object-fit:cover;" width="150" height="150" src="{{ asset('upload/'.$value->photo) }}" />

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
                                    <td><span class="badge bg-dark">{{ date('d-m-y', strtotime($value->created_at)) }}</span> </td>
                                    <td>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/users/view/'. $value->id ) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm me-2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg> <span class="">View </span>
                                        </a>
                                    </td>
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
