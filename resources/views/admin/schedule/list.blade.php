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
                        <form action="{{ url('admin/schedule') }}" method="POST">
                            {{ csrf_field() }}
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
                                    $getUserWeek = App\Models\User_time::getDetail($row->id);
                                    $start_time = !empty($getUserWeek->start_time) ? $getUserWeek->start_time : '';
                                    $open_close = !empty($getUserWeek->status) ? $getUserWeek->status : '';
                                    $end_time = !empty($getUserWeek->end_time) ? $getUserWeek->end_time : '';
                                    @endphp

                                    <tr class="table-info text-dark">
                                        <td>{{ !empty($row->name) ? $row->name : '' }}</td>

                                        <td>
                                            <input type="hidden" name="week[{{ $row->id }}][week_id]" value="{{ $row->id }}">
                                            <label for="check" class="switch">
                                                <input type="checkbox" name="week[{{ $row->id }}][status]" class="change-availibility" id="{{ $row->id }}" {{ !empty($open_close) ? 'checked' : '' }}>
                                            </label>
                                        </td>

                                        <td>
                                            <select name="week[{{ $row->id }}][start_time]" class="form-control required-{{ $row->id }} show-availibility-{{ $row->id }}">

                                                <option value="">Select Start time</option>
                                                @foreach ($week_time_row as $time_row1 )
                                                <option {{ (trim($start_time) == trim($time_row1->name)) ? 'selected' : '' }} value="{{ $time_row1->name }}">{{ $time_row1->name }}</option>
                                                @endforeach
                                            </select>

                                        </td>

                                        <td>
                                            <select name="week[{{ $row->id }}][end_time]" id="" class="form-control required-{{ $row->id }} show-availibility-{{ $row->id }}">
                                                <option value="">Select End time</option>
                                                @foreach ($week_time_row as $time_now )
                                                <option value="{{ $time_now->name }}" {{ (trim($end_time) == trim($time_now->name)) ? 'selected' : '' }}>{{ $time_now->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table><br>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>

                        </form>
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
    
    // $('.change-availibility').click(function (e) { 
    //     var id  = $(this).attr('id');

    //     e.preventDefault();

    //     if (this.checked) {
    //         $('')
    //     }
        
    // });

    // .$().click(function (e) { 
    //     e.preventDefault();
        
    // });

</script>

@endsection
