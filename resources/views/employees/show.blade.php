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
              
              <!-- Summary Data -->
              <a href="/employees" class="btn btn-default">Go Back</a>
              <hr>

              <div class="panel">
                <div class="panel-body">
                  <div class="row">
                    <div style="padding: 25px;" class="col-md-3 text-center">
                      @if($employee->cover_image)
                        <img style="max-width: 250px;" src="/storage/cover_images/{{ $employee->cover_image }}" alt="Avatar" class="img-circle pull-left avatar">
                      @else
                    
                      @endif
                    </div>
                    <div class="col-md-8">
                      <h2>This is the Employee ID: {{$employee->id}}</h2>
                      <h3>User ID: {{$employee->user_id}}</h3>
                      <h3>User Name: {{$employee->user->name}}</h3>
                      <h3>Card Number: {{$employee->card_number}}</h3>
                      <h3>Color: {{$employee->color}}</h3>
                      <h3>Created on: {{$employee->created_at}}</h3>
                      <h3>Updated on: {{$employee->updated_at}}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <!-- Edit button -->
              <a href="/employees/{{$employee->id}}/edit" class="btn btn-default">Edit</a>
              <!-- Delete button -->
              {!!Form::open(['action' => ['EmployeesController@destroy', $employee->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
              {!!Form::close()!!}
              <!-- End Summary Data -->
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