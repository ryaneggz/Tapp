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
									<div class="panel-body table-responsive">
										<table class="table table-bordered text-center table-hover">
											<thead>
												<tr class="bg-info"><th>Shift</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>
											</thead>
											<tbody>
	
												<!-- TIMECARD TABLE --> 
												@if(count($schedules) > 0)
												@foreach($schedules as $schedule)
													<tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Morning</th>
														<td>@if($monday_morning) {{ $monday_morning->user->name }} @endif</td>
														<td>@if($tuesday_morning) {{ $tuesday_morning->user->name }} @endif</td>
														<td>@if($wednesday_morning) {{ $wednesday_morning->user->name }} @endif</td>
														<td>@if($thursday_morning) {{ $thursday_morning->user->name }} @endif</td>
														<td>@if($friday_morning) {{ $friday_morning->user->name }} @endif</td>
														<td>@if($saturday_morning) {{ $saturday_morning->user->name }} @endif</td>
														<td>@if($sunday_morning) {{ $sunday_morning->user->name }} @endif</td>
													</tr>
													<tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Afternoon</th>
														<td>@if($monday_afternoon) {{ $monday_afternoon->user->name }} @endif</td>
														<td>@if($tuesday_afternoon) {{ $tuesday_afternoon->user->name }} @endif</td>
														<td>@if($wednesday_afternoon) {{ $wednesday_afternoon->user->name }} @endif</td>
														<td>@if($thursday_afternoon) {{ $thursday_afternoon->user->name }} @endif</td>
														<td>@if($friday_afternoon) {{ $friday_afternoon->user->name }} @endif</td>
														<td>@if($saturday_afternoon) {{ $saturday_afternoon->user->name }} @endif</td>
														<td>@if($sunday_afternoon) {{ $sunday_afternoon->user->name }} @endif</td>
													</tr>
													<tr onClick='window.location.href="/schedules/{{$schedule->id}}";'><th scope="col">Evening</th>
														<td>@if($monday_evening) {{ $monday_evening->user->name }} @endif</td>
														<td>@if($tuesday_evening) {{ $tuesday_evening->user->name }} @endif</td>
														<td>@if($wednesday_evening) {{ $wednesday_evening->user->name }} @endif</td>
														<td>@if($thursday_evening) {{ $thursday_evening->user->name }} @endif</td>
														<td>@if($friday_evening) {{ $friday_evening->user->name }} @endif</td>
														<td>@if($saturday_evening) {{ $saturday_evening->user->name }} @endif</td>
														<td>@if($sunday_evening) {{ $sunday_evening->user->name }} @endif</td>
													</tr>
												@endforeach
													{{$schedules->links()}}
												@else
												<td>No Schedules Found</td>
											@endif
											<!-- END TIMECARD TABLE -->
											
		
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
					<div class="row">
						<div class="col-md-6">
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
															<th scope="row">{{$timecard->employee_id}}</th><td>{{date('n-d-y @ g:i:s A', $timecard->time_in)}}</td><td>@if($timecard->time_out > 0){{date('n-d-y @ g:i A',$timecard->time_out)}}@endif</td><td>@if($timecard->time_out > 0){{date('H:i:s', $timecard->total_time)}}@endif</td>
														</tr>
													@endforeach
													@else
													<tr scope="row">
														<td>No records found</td>
													</tr>
												@endif
												<!-- END TIMECARD TABLE -->

											</tbody>
										</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
										<div class="col-md-6 text-right"><a href="/timecards" class="btn btn-primary">View All Shifts</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT SHIFTS -->
						</div>
						<div class="col-md-6">
							<!-- TIMELINE -->
							<div class="panel panel-scrolling">
								<div class="panel-heading">
									<h3 class="panel-title">Recent User Activity</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="slimScrollDiv" style="position: relative; width: auto; height: 430px;">
									<div class="panel-body" style="overflow: auto; width: auto; height: 430px;">
										<ul class="list-unstyled activity-list">
											@if(count($summaries) > 0)
												@foreach($summaries as $summary)
													<li>
														<img src="assets/img/user1.png" alt="Avatar" class="img-circle pull-left avatar">
														<p><a href="/summaries/{{$summary->id}}">{{$summary->employee->user->name}}</a><br> {!!$summary->body!!} <br><span class="timestamp pull-right">{{$summary->updated_at}}</span></p>
													</li>
												@endforeach
											@else
												<li>
													<h3>No records found</h3>
												</li>
											@endif
										</ul>
										<button type="button" class="btn btn-primary btn-bottom center-block">Load More</button>
									</div>
								<div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 18px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 324.386px;"></div>
								<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
							</div>
							</div>
							<!-- END TIMELINE -->
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