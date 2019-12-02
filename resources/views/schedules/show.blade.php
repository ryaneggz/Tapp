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

							<!-- BORDERED TABLE -->
							<div class="panel">
                <div class="panel-heading">
								<a href="/schedules?page={{$schedule->id}}" class="btn btn-default">Go Back</a>
                  <h3 class="panel-title pull-right">
                    Week ID: {{$schedule->id}}
                  </h3>
                </div>
								<div class="panel-body table-responsive">

									<table class="table table-bordered text-center table-hover">
										<thead>
											<tr class="bg-info"><th>Shift</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>
										</thead>
										<tbody>
                      <tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Morning</th>
												<td @if($monday_morning) style="background: {{$monday_morning->color}}"@endif>@if($monday_morning) {{ $monday_morning->user->name }} @endif</td>
												<td @if($tuesday_morning) style="background: {{$tuesday_morning->color}}"@endif>@if($tuesday_morning) {{ $tuesday_morning->user->name }} @endif</td>
												<td @if($wednesday_morning) style="background: {{$wednesday_morning->color}}"@endif>@if($wednesday_morning) {{ $wednesday_morning->user->name }} @endif</td>
												<td @if($thursday_morning) style="background: {{$thursday_morning->color}}"@endif>@if($thursday_morning) {{ $thursday_morning->user->name }} @endif</td>
												<td @if($friday_morning) style="background: {{$friday_morning->color}}"@endif>@if($friday_morning) {{ $friday_morning->user->name }} @endif</td>
												<td @if($saturday_morning) style="background: {{$saturday_morning->color}}"@endif>@if($saturday_morning) {{ $saturday_morning->user->name }} @endif</td>
												<td @if($sunday_morning) style="background: {{$sunday_morning->color}}"@endif>@if($sunday_morning) {{ $sunday_morning->user->name }} @endif</td>
											</tr>
											<tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Afternoon</th>
												<td @if($monday_afternoon) style="background: {{$monday_afternoon->color}}"@endif>@if($monday_afternoon) {{ $monday_afternoon->user->name }} @endif</td>
												<td @if($tuesday_afternoon) style="background: {{$tuesday_afternoon->color}}"@endif>@if($tuesday_afternoon) {{ $tuesday_afternoon->user->name }} @endif</td>
												<td @if($wednesday_afternoon) style="background: {{$wednesday_afternoon->color}}"@endif>@if($wednesday_afternoon) {{ $wednesday_afternoon->user->name }} @endif</td>
												<td @if($thursday_afternoon) style="background: {{$thursday_afternoon->color}}"@endif>@if($thursday_afternoon) {{ $thursday_afternoon->user->name }} @endif</td>
												<td @if($friday_afternoon) style="background: {{$friday_afternoon->color}}"@endif>@if($friday_afternoon) {{ $friday_afternoon->user->name }} @endif</td>
												<td @if($saturday_afternoon) style="background: {{$saturday_afternoon->color}}"@endif>@if($saturday_afternoon) {{ $saturday_afternoon->user->name }} @endif</td>
												<td @if($sunday_afternoon) style="background: {{$sunday_afternoon->color}}"@endif>@if($sunday_afternoon) {{ $sunday_afternoon->user->name }} @endif</td>
											</tr>
											<tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Evening</th>
												<td @if($monday_evening) style="background: {{$monday_evening->color}}"@endif>@if($monday_evening) {{ $monday_evening->user->name }} @endif</td>
												<td @if($tuesday_evening) style="background: {{$tuesday_evening->color}}"@endif>@if($tuesday_evening) {{ $tuesday_evening->user->name }} @endif</td>
												<td @if($wednesday_evening) style="background: {{$wednesday_evening->color}}"@endif>@if($wednesday_evening) {{ $wednesday_evening->user->name }} @endif</td>
												<td @if($thursday_evening) style="background: {{$thursday_evening->color}}"@endif>@if($thursday_evening) {{ $thursday_evening->user->name }} @endif</td>
												<td @if($friday_evening) style="background: {{$friday_evening->color}}"@endif>@if($friday_evening) {{ $friday_evening->user->name }} @endif</td>
												<td @if($saturday_evening) style="background: {{$saturday_evening->color}}"@endif>@if($saturday_evening) {{ $saturday_evening->user->name }} @endif</td>
												<td @if($sunday_evening) style="background: {{$sunday_evening->color}}"@endif>@if($sunday_evening) {{ $sunday_evening->user->name }} @endif</td>
											</tr>
                    </tbody>
									</table>
                </div>
                {{ Form::close() }}
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                    <div class="col-md-6 text-right"><a href="/schedules/{{$schedule->id}}/edit" class="btn btn-primary">Edit Schedule</a></div>
                  </div>
                </div>
							</div>
              <!-- END BORDERED TABLE -->
              
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