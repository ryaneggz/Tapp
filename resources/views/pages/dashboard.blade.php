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
									<h3 class="panel-title">This weeks schedule</h3>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-bordered text-center table-hover">
										<thead>
											<tr class="bg-info"><th>Shift</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>
										</thead>
										<tbody>
											<tr><th scope="col">Morning</th><td>Steve</td><td>Jobs</td><td>off</td><td>off</td><td>off</td><td>off</td><td>off</td></tr>
											<tr><th scope="col">Afternoon</th><td>Simon</td><td>Philips</td><td>off</td><td>off</td><td>off</td><td>off</td><td>off</td></tr>
											<tr><th scope="col">Evening</th><td>Jane</td><td>Doe</td><td>off</td><td>off</td><td>off</td><td>off</td><td>off</td></tr>
										</tbody>
									</table>
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
												@if(count($timecards) > 1)
													@foreach($timecards as $timecard)
														<tr onClick='window.location.href="/timecards/{{$timecard->id}}";'>
															<th scope="row">{{$timecard->employee_id}}</th><td>{{date('n-d-y | g:i:s A', $timecard->time_in)}}</td><td>{{date('n-d-y | g:i:s A', $timecard->time_out)}}</td><td>{{gmdate('H:i:s', $timecard->total_time)}}</td>
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
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">To-Do List</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled todo-list">
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<span class="title">Restart Server</span>
												<span class="short-description">Dynamically integrate client-centric technologies without cooperative resources.</span>
												<span class="date">Oct 9, 2016</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<span class="title">Retest Upload Scenario</span>
												<span class="short-description">Compellingly implement clicks-and-mortar relationships without highly efficient metrics.</span>
												<span class="date">Oct 23, 2016</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<strong>Functional Spec Meeting</strong>
												<span class="short-description">Monotonectally formulate client-focused core competencies after parallel web-readiness.</span>
												<span class="date">Oct 11, 2016</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END TODO LIST -->
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