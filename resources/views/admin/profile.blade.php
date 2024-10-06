@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content ">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
        </ol>
    </nav>

    <div class="row form-control">
        <div class="body-card">
            @include('_message')
            <div class="card-body">

                <h6 class="card-title">Update Profile</h6>

                <form method="post" action="{{ url('admin/my_profil/update') }}" class="forms-sample">
                    {{ csrf_field() }}

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">
                            Name<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $getRecord->name }}"  name="name" placeholder="name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}"  name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Profile Image<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="photo">
                          
                            @if(!empty($getRecord->photo))
                            <img class="wd-80 ht-80 rounded-circle" src="{{ asset('upload/'.Auth::user()->photo) }}" alt="">     
                            @endif

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" value="{{ old('password', $getRecord->password) }}"  name="password" placeholder="Password">
                        </div>
                    </div>

            </div>

            <button type="submit" class="btn btn-primary me-2">Updade</button>


        </div>
    </div>
</div>

</div>
@endsection
