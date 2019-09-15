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
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- ENTER TIMECARD PANEL -->
              <div class="panel">
                <div class="panel-body">
                  {{ Form::open(['action' => ['TimecardsController@update', $timecard->id], 'method' => 'POST']) }}

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('employee_id', 'Employee ID') }} 
                        {{ Form::text('employee_id', $timecard->employee_id, ['class' => 'form-control', 'placeholder' => 'Employee ID']) }}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-">
                        {{ Form::label('time_in', 'Time-in') }} 
                        <input id="my_time_in" class="form-control" type="datetime-local" name="time_in">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('time-out', 'Time-out') }} 
                        <input class="form-control" type="datetime-local" name="time_out">
                      </div>
                      <div class="col">
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Submit', ['class'=>'form-control']) }}
                      </div>
                    </div>
                  {{ Form::close() }}
                </div>
              </div>
              <!-- END ENTER TIMECARD PANEL -->
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