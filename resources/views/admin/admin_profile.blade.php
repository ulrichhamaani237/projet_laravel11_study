@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    @include('_message')
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">My Profile </h6>
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <img src="{{ asset('upload/'.Auth::user()->photo) }}" style="border-radius: 100%; object-fit:cover" width="100" height="100" alt="">
                    </div>

                    <p>Hi! {{ Auth::user()->About }}</p>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        <p class="text-muted">{{ Auth::user()->name }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">{{ Auth::user()->created_at }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                        <p class="text-muted"> {{ Auth::user()->username }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                        <p class="text-muted">{{ Auth::user()->role }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted"> {{ Auth::user()->address }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                        <p class="text-muted"> {{ Auth::user()->website }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone Number:</label>
                        <p class="text-muted">{{ Auth::user()->phone }}</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-9 middle-wrapper">
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Profile Update</h6>


                            <form class="forms-sample" action="{{ url('admin_profile/update') }}" method="POST"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" placeholder="Name">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" value="{{ $getRecord->username }}" class="form-control" placeholder="Username">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ $getRecord->email }}" placeholder="Email">
                                    <span style="color: red" >{{ $errors->first('email') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="mb-3  " style="display: flex; flex-direction:row; align-items:center; flex-wrap:wrap; justify-content:space-between">
                                   <div><label class="form-label">Profile Image</label>
                                    <input type="file" name="photo" class="form-control">
                                  </div> 

                                  @if(!empty($getRecord->photo))

                                  <img  style="border-radius: 100%; object-fit:cover;" width="150" height="150" src="{{ asset('upload/'.$getRecord->photo) }}" />

                                  @endif

                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ $getRecord->address }}" class="form-control" placeholder="address">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" value="{{ $getRecord->phone }}" class="form-control" placeholder="phone">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Website</label>
                                    <input type="text" name="website" value="{{ $getRecord->website }}" class="form-control" placeholder="website">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">About Me </label>
                                    <textarea type='text' class="form-control" placeholder="About" name="about" value="{{ $getRecord->about }}"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        <div class="d-none d-xl-block col-xl-3">

        </div>
        <!-- right wrapper end -->
    </div>

</div>

@endsection
