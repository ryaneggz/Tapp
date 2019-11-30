@extends('layouts.app')

@section('content')
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
    @include('inc.navbar')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('inc.sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
              <!-- Timecard Data -->
              <h2>This is the Report ID: {{$report->id}}</h2>
              <h3>This is the Employee ID: {{$report->employee_id}}</h3>
              <h3>This is the Employee Name: {{$employee_name}}</h3>
              <h3>Start Date: {{ date('n/d/y | g:i A', $report->pay_period_start) }}</h3>
              <h3>End Date: {{ date('n/d/y | g:i A', $report->pay_period_end) }}</h3>
              <h3>This is the Total Time: {{ $report->total_hours }}</h3>
              <hr>

              <!-- This is the delete button -->
              {!!Form::open(['action' => ['ReportsController@destroy', $report->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
              {!!Form::close()!!}

            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
@endsection