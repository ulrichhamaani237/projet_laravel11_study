@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
            
        </ol>
        <div class="d-flex align-items-center">
            <a href=""  class="btn btn-info">{{ $TotalAdmin }} Admin</a>&nbsp; &nbsp;
            <a href="" class="btn btn-warning">{{ $TotalUser }} user</a>&nbsp;&nbsp;
            <a href="" class="btn btn-secondary"> {{ $TotalAgent }} Agnent </a>&nbsp;&nbsp;
            <a href="" class="btn btn-danger"> {{ $TotalActive }} active</a>&nbsp;&nbsp;
            <a href="" class="btn btn-success">{{ $TotalInactive }} Inactive</a>&nbsp;&nbsp;
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a href="{{ url('admin/test') }}">Seach Users</a>
                    </div>
                    <form action="" method="GET" class="form-control">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3 ">
                                    <label for="" class="form-label">id</label>
                                </div>

                                <input type="text" name="id" value="{{ Request()->id }}" placeholder="Enter id" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                </div>
                                <input type="text" name="name" value="{{ Request()->name }}" placeholder="Enter Name" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                </div>
                                <input type="text" name="username" value="{{ Request()->username }}" placeholder="Enter userName" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <select class="compose-multiple-select form-select" name="user_id">
                                    <option value="">select email Agent or User</option>
                                    @foreach ($getRecord as $value)
                                    <option value="{{ $value->id }}">{{ $value->email }} -
                                        {{ $value->role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">phone</label>
                                </div>
                                <input type="text" name="phone" value="{{ Request()->phone }}" placeholder="Enter phone number" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="website" class="form-label">website</label>
                                </div>
                                <input type="text" name="website" value="{{ Request()->website }}" placeholder="Enter website" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="role" class="form-label">role</label>
                                </div>
                                <select class="compose-multiple-select form-control" name="role">

                                    <option value="">
                                        select role
                                    </option>

                                    <option value="admin" {{ (Request()->role == 'admin') ? 'selected' : '' }}>
                                        admin
                                    </option>
                                    <option value="agent" {{ (Request()->role == 'agent') ? 'selected' : '' }}>
                                        agent
                                    </option>
                                    <option value="user" {{ (Request()->role == 'user') ? 'selected' : '' }}>
                                        user
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">status</label>
                                </div>
                                <select class="compose-multiple-select form-control" name="status">
                                    <option>
                                        select status
                                    </option>
                                    <option value="active" {{ (Request()->status == 'active') ? 'selected' : '' }}>
                                        active
                                    </option>
                                    <option value="inactive" {{ (Request()->status == 'inactive') ? 'selected' : '' }}>
                                        inactive
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="website" class="form-label">Start Date</label>
                            </div>
                            <input type="date" name="start_date" value="{{ Request()->start_date }}" placeholder="Enter start date" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="website" class="form-label">End Date</label>
                            </div>
                            <input type="date" name="end_date" value="{{ Request()->end_date }}" placeholder="Enter end date" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary">
                            Seach
                        </button>

                        <a href="{{ url('admin/users') }}" class="btn btn-danger h3">Reset</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>


</div>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="card-title">Users List</h4>
                    <div class="d-flex  align-items-center">

                        <a href="{{ url('admin/users/add') }}" class="btn btn-primary">Add User</a>

                    </div>
                </div>




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
                            @forelse ($getRecord as $value )


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

                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/users/edit/'. $value->id ) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm me-2">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                        <span class="">
                                            Edit
                                        </span>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/users/delete/'.$value->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm me-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg> <span class="">Delete</span>
                                    </a>

                                </td>
                            </tr>
                            @empty
                            <tr style=" colspan:5">
                                <td>No data found</td>
                            </tr>

                            @endforelse
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


@endsection
