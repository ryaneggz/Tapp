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
              <h2>This is the Timecard ID: {{$timecard->id}}</h2>
              <h3>This is the Employee ID: {{$timecard->employee_id}}</h3>
              {{-- <h3>This is the Employee Name: {{$timecard->employee->user->name}}</h3> --}}
              <h3>This is the Time In: {{ date('n/d/y | g:i A', $timecard->time_in) }}</h3>
              <h3>This is the Time Out: {{ date('n/d/y | g:i A',$timecard->time_out) }}</h3>
              <h3>This is the Total Time: {{ gmdate('H:i:s', $timecard->total_time) }}</h3>
              <hr>
              <a href="/timecards/{{$timecard->id}}/edit" class="btn btn-primary">Edit</a>

              <!-- This is the delete button -->
              {!!Form::open(['action' => ['TimecardsController@destroy', $timecard->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
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