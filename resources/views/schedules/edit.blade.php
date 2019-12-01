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
                {{ Form::open(['action' => ['SchedulesController@update', $schedule->id], 'method' => 'POST']) }}
								<div class="panel-heading">
                  <a href="/schedules" class="btn btn-default">Go Back</a>
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
                    
                      <!--TABLE ROW 1 -->
                      <tr>
                        <th scope="col">Morning</th>
                        <td>
                          <select class='form-control' name='monday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $monday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='tuesday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $tuesday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='wednesday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $wednesday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='thursday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $thursday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='friday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $friday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='saturday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $saturday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='sunday_morning'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $sunday_morning) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <!-- END TABLE ROW 1 -->

                      <!-- TABLE ROW 2 -->
											 <tr>
                        <th scope="col">Afternoon</th>
                        <td>
                          <select class='form-control' name='monday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $monday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='tuesday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $tuesday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='wednesday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $wednesday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='thursday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $thursday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='friday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $friday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='saturday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $saturday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='sunday_afternoon'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $sunday_afternoon) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <!-- END TABLE ROW 2 -->

                      <!-- TABLE ROW 3 -->
                      <tr>
                        <th scope="col">Evening</th>
                        <td>
                          <select class='form-control' name='monday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                              <option @if($employee->id == $monday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='tuesday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $tuesday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='wednesday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $wednesday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='thursday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $thursday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='friday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $friday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='saturday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $saturday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='sunday_evening'>
                            <option value={{null}}></option>
                            @foreach($employees as $employee)
                            <option @if($employee->id == $sunday_evening) selected @endif value={{$employee->id}}>{{$employee->user->name}}
                            </option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
  
                    </tbody>
									</table>
                </div>
                
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                    <div class="col-md-6 text-right">
                      {{ Form::hidden('_method', 'PUT') }}
                      {{ Form::submit('Save Schudule', ['class'=>'btn btn-success']) }}
                    </div>
                  </div>
                  {{ Form::close() }}
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