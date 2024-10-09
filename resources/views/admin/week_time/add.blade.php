@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content ">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/week_time') }}">Week time</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users week time</li>
        </ol>
    </nav>

    <div class="row form-control">
        <div class="body-card">
            <div class="card-body">
                <h6 class="card-title">Add week</h6>
                <form method="post" action="{{ url('admin/week_time/add') }}" class="forms-sample">
                    {{ csrf_field() }}

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">name<span style="color: rgba(175, 22, 22, 0.726)">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputUsername2" name="name" placeholder="username">
                        </div>
                    </div>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ url('admin/week_time') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
