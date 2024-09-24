@extends('admin.admin_dashboard')
@section('admin')



<div class="page-content">
    @include('_message')
    <div class="col-lg-12">
        <div class="p-3 border-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-end mb-2 mb-md-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox text-muted me-2">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                            <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                        </svg>
                        <h4 class="me-1">Inbox</h4>
                        <span class="text-muted">(2 new messages)</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search mail...">
                        <button class="btn btn-light btn-icon" type="button" id="button-search-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-none d-md-flex align-items-center flex-wrap">
                <div class="form-check me-3">
                    <input type="checkbox" class="form-check-input" id="inboxCheckAll">
                </div>
                <div class="btn-group me-2">
                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" type="button"> With selected <span class="caret"></span></button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#">Mark as read</a>
                        <a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                </div>
                <div class="btn-group me-2">
                    <button class="btn btn-outline-primary" type="button">Archive</button>
                    <button class="btn btn-outline-primary" type="button">Span</button>
                    <a class="btn btn-outline-primary" onclick=" return confirm('Are you sure you want to delete?')" id="getDeleteURL" href="" >Delete</a>
                </div>
                <div class="btn-group me-2 d-none d-xl-block">
                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" type="button">Order by <span class="caret"></span></button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#">Date</a>
                        <a class="dropdown-item" href="#">From</a>
                        <a class="dropdown-item" href="#">Subject</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Size</a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end flex-grow-1">
                <span class="me-2">1-10 of 253</span>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg></button>
                    <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></button>
                </div>
            </div>
        </div>
        <div class="email-list">

            <!-- email list item -->
            @foreach ($getEmail as $value )

            <div class="email-list-item email-list-item--unread">
                <div class="email-list-actions">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input delete-all-option" value="{{ $value->id }}">
                    </div>

                    <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg></span></a>
                </div>
                <a href="./read.html" class="email-list-detail">
                    <div class="content">
                        <span class="from">{{ $value->subject }}</span>
                        <p class="msg">{{ $value->description }}</p>
                    </div>
                    <span class="date">
                        {{date('m Y', strtotime($value->created_at))}}
                    </span>
                </a>
            </div>

            @endforeach




        </div>
    </div>
</div>


@endsection
@section('script')

<script type="text/javascript">

    $('.delete-all-option').change(function() {
        var total = '';
        $('.delete-all-option').each(function() {
            if (this.checked) {
                var id = $(this).val();
                total += id + ',';
            }
        });

        var url = '{{ url('admin/email_sent?id=')}}'+total;
       
        $('#getDeleteURL').attr('href', url);
    });

</script>

@endsection
