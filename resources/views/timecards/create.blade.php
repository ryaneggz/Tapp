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
            <div class="col-md-9">
              <!-- RECENT SHIFTS -->
							<div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Recent Shifts</h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                  </div>
                </div>
                <div class="panel-body no-padding">
                  <table class="table table-hover">
                      <thead class="thead-primary">
                        <tr class="bg-info">
                          <th scope="col">ID#</th><th scope="col">Time In</th><th scope="col">Time Out</th><th scope="col">Shift Total</th>
                        </tr>
                      </thead>
                      <tbody>

                        <!-- TIMECARD TABLE --> 
                        @if(count($timecards) > 0)
                          @foreach($timecards as $timecard)
                            <tr onClick='window.location.href="/timecards/{{$timecard->id}}";'>
                              <th scope="row">{{$timecard->employee_id}}</th><td>{{date('n/d/y | g:i A', $timecard->time_in)}}</td><td>{{date('n/d/y | g:i A',$timecard->time_out)}}</td><td>{{gmdate('H:i:s',$timecard->total_time)}}</td>
                            </tr>
                          @endforeach
                          {{$timecards->links()}}
                          @else
                          <p>No Timecards Found</p>
                        @endif
                        <!-- END TIMECARD TABLE -->

                      </tbody>
                    </table>
                  </div>
                  {{-- <div class="panel-footer">
                    <div class="row">
                      <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                      <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Shifts</a></div>
                    </div>
                  </div> --}}
                </div>
                <!-- END RECENT SHIFTS -->
            </div>
            <div class="col-md-3">
              <!-- ENTER TIMECARD PANEL -->
              <div class="panel">
                <div class="panel-body table-responsive">
                  {{ Form::open(['action' => 'TimecardsController@store', 'method' => 'POST']) }}

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('title', 'Employee ID') }} 
                        {{ Form::text('employee_id', '', ['class' => 'form-control', 'placeholder' => 'ID #']) }}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('time-in', 'Time-in') }} 
                        {{-- {{ Form::selectMonth('January', ['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Timecard']) }} --}}
                        {{ Form::text('in_date', '', ['class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'mm/dd/yyyy']) }}
                        {{ Form::time('time_in', '', ['class'=>'form-control']) }}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col">
                        {{ Form::label('time-out', 'Time-out') }} 
                        {{-- {{ Form::selectMonth('January', ['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Timecard']) }} --}}
                        {{ Form::text('out_date', '', ['class'=>'form-control', 'id'=>'datepicker-2', 'placeholder'=>'mm/dd/yyyy']) }}
                        {{ Form::time('time_out', '', ['class'=>'form-control']) }}
                      </div>
                      <div class="col">
                      {{ Form::submit('Submit', ['class'=>'form-control']) }}
                      </div>
                    </div>
                  {{ Form::close() }}
                  <div class='col'  >
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