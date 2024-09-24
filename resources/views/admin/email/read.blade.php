@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    @include('_message')
    <div class="col-lg-12">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star text-primary icon-lg me-2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <span>{{ $getRecord->subject }}</span>
          </div>
          <div>
            <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Forward"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share text-muted icon-lg"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg></a>
            <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Print"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer text-muted icon-lg"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>
            <a href="{{ url('admin/email/read_delete/'.$getRecord->id) }}" data-bs-toggle="tooltip" data-bs-title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-muted icon-lg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            </a>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
          <div class="d-flex align-items-center">
            <div class="me-2">
              <img src="https://via.placeholder.com/36x36" alt="Avatar" class="rounded-circle img-xs">
            </div>
            <div class="d-flex align-items-center">
              <a href="#" class="text-body">John Doe</a> 
              <span class="mx-2 text-muted">to</span>
              <a href="#" class="text-body me-2">me</a>
              <div class="actions dropdown">
                <a href="#" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down icon-lg text-muted"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="#">Mark as read</a>
                  <a class="dropdown-item" href="#">Mark as unread</a>
                  <a class="dropdown-item" href="#">Spam</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="#">Delete</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tx-13 text-muted mt-2 mt-sm-0">{{ date('d m', strtotime($getRecord->created_at)) }}</div>
        </div>
        <div class="p-4 border-bottom">
          <p>{{ $getRecord->description }}</p>
        </div>
       
      </div>
</div>

@endsection