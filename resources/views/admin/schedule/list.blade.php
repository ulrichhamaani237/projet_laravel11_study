@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    @include('_message')
    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Schedule</a></li>
            <li class="breadcrumb-item active" aria-current="page">Schedule List</li>

        </ol>
      
    </nav>

    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Users List</h4>
                    </div>
    
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>week</th>
                                    <th>Open/Close</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($week as $row )

                              @php
                               $getUserWeek =  App\Models\User_time::getDetail($row->id);
                               $open_close =  !empty($getUserWeek->start_time) ? $getUserWeek->start_time : '';
                               $start_time =  !empty($getUserWeek->status) ? $getUserWeek->status : '';
                               $end_time   =  !empty($getUserWeek->end_time) ? $getUserWeek->end_time : '';
                              @endphp

                                  <tr class="table-info text-dark">
                                    <td>{{ !empty($row->name) ? $row->name : '' }}</td>

                                    <td>
                                        <input type="hidden" name="week[{{ $row->id }}][week_id]" value="{{ $row->id }}">
                                        <label for="check" class="switch">
                                            <input type="checkbox" name="week[{{ $row->id }}][status]" id="{{ $row->id }}" {{ !empty($open_close) ? 'checked' : '' }}>
                                        </label>
                                    </td>

                                    <td>
                                        <select name="week[{{ $row->id }}][start_time]"  class="form-control"
                                            
                                            >
                                             @foreach ($week_time_row as $time_row1 )
                                            <option value="">{{ $time_row1->name }}</option>
                                             @endforeach
                                        </select>
                                       
                                    </td>
                                    <td>
                                        <select name="week[{{ $row->id }}][end_time]" id="" class="form-control"
                                         }}"
                                        >
                                        @foreach ($week_time_row as $time_now )
                                            <option value="">{{ $time_now->name }}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
    
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

  

    <br>


</div>


@endsection

@section('script')

<script type="text/javascript">
    $('table').on('click', '.submitfform', function(event) {
        var id = $(this).attr('id');

        $.ajax({
            url: "{{ url('admin/users/update') }}"
            , methode: 'post'
            , data: $('.a_form' + id).serialize()
            , dataType: 'json'
            , success: function(response) {

                alert(response.success);

            }
        });

    });


$('.changeStatus').change(function (e) { 
    var status_id = $(this).val();
    var order_id = $(this).attr('id');
    e.preventDefault();

    $.ajax({
        type: "GET",
        url: "{{ url('admin/users/changeStatus') }}",
        data: {status_id: status_id, order_id: order_id},
        dataType: "JSON",
        success: function (data) {
            // alert("Status update successfully Changed status!")
            window.location.href = "";
        }
    });
    
});
</script>

@endsection
