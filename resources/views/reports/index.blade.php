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
              <div class="container-fluid">
                @include('inc.messages')
              </div>
              <div class="col-md-12">

              <!-- RECENT REPORTS -->
							<div class="panel">
                <div class="panel-body">

                  <div class="row">
                    {{ Form::open(['action' => 'ReportsController@store', 'method' => 'POST']) }}
                      <div class="form-group col-md-2">
                        <label for="pay_period_start">Period Start</label>
                        <input type="date" class="form-control" name="pay_period_start">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="pay_period_start">Period End</label>
                        <input type="date" class="form-control" name="pay_period_end">
                      </div>
                      <div class="form-group col-md-2">
                        <div style="padding-top: 25px;">
                          {{ Form::submit('Generate Report', ['class'=>'btn btn-primary btn-block']) }}
                        </div>
                      </div>
                    {{ Form::close() }}
                  </div>

                  <div class="container-fluid no-padding table-responsive">
                    <table class="table table-hover">
                      <thead class="thead-primary">
                        <tr class="bg-info">
                            <th scope="col">ID#</th><th scope="col">Employee ID</th><th scope="col">Period Start</th><th scope="col">Period End</th><th scope="col">Total Hours</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- REPORT TABLE --> 
                        @if(count($reports) > 0)
                          @foreach($reports as $report)
                            <tr onClick='window.location.href="/reports/{{$report->id}}";'>
                              <th scope="row">{{ $report->id }}</th><td>00{{ $report->employee_id }}</td><td>{{  date('n-d-y | g:i A', $report->pay_period_start) }}</td><td>{{ date('n-d-y | g:i A', $report->pay_period_end) }}</td><td>{{ $report->total_hours }}</td>
                            </tr>
                          @endforeach
                          {{-- {{$reports->links()}} --}}
                          @else
                          <td>No reports Found</td>
                        @endif
                        <!-- END REPORT TABLE -->
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- END RECENT REPORTS -->

              
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