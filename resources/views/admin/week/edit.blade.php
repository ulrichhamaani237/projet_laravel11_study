@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content ">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Week</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Update week </li>
        </ol>
    </nav>

    <div class="row form-control">
        <div class="body-card">
            <div class="card-body">

                <h6 class="card-title">Update week</h6>

                <form method="post" action="{{ url('admin/week/edit/'.$getRecord->id) }}" class="forms-sample">
                    {{ csrf_field() }}

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">
                            Name<span style="color: red">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" value="" class="form-control" id="exampleInputUsername2" name="name" placeholder="name">
                        </div>
                    </div>
            </div>

            <button type="submit" class="btn btn-primary me-2">Update</button>
            <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>
    </div>
</div>


@endsection
