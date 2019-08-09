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
                <div class="panel-body table-responsive">
                  {{ Form::open(['action' => ['TimecardsController@update', $timecard->id], 'method' => 'POST']) }}

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('title', 'Employee ID') }} 
                        {{ Form::text('employee_id', $timecard->employee_id, ['class' => 'form-control', 'placeholder' => 'ID #']) }}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('time-in', 'Time-in') }} 
                        {{-- {{ Form::selectMonth('January', ['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Timecard']) }} --}}
                        {{ Form::text('in_date', date('m/d/Y', $timecard->time_in), ['class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'mm/dd/yyyy']) }}
                        {{ Form::time('time_in', date('h:i', $timecard->time_in), ['class'=>'form-control']) }}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('time-out', 'Time-out') }} 
                        {{-- {{ Form::selectMonth('January', ['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Timecard']) }} --}}
                        {{ Form::text('out_date', date('m/d/Y', $timecard->time_out), ['class'=>'form-control', 'id'=>'datepicker-2', 'placeholder'=>'mm/dd/yyyy']) }}
                        {{ Form::time('time_out', date('h:i', $timecard->time_out), ['class'=>'form-control']) }}
                      </div>
                      <div class="col">
                      {{ Form::hidden('_method', 'PUT') }}
                      {{ Form::submit('Submit', ['class'=>'form-control']) }}
                      </div>
                    </div>
                  {{ Form::close() }}
                  <div class='col'>
                    @include('inc.messages')
                  </div>
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