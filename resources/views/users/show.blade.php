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
              <a href="/users" class="btn btn-default">Go Back</a>
              <h1>This is the user ID: {{$user->id}}</h1>
              <h3>User ID: {{$user->name}}</h3>
              <h3>Employee ID: {{$user->employee_id}}</h3>
              <h3>User Email: {{$user->email}}</h3>
              {{-- <h3>Employee Card Number: {{$user->employee->card_number}}</h3> --}}
              <h3>Created on: {{$user->created_at}}</h3>
              <h3>Updated on: {{$user->updated_at}}</h3>
              <hr>
              <!-- Edit button -->
              <a href="/users/{{$user->id}}/edit" class="btn btn-default">Edit</a>
              <!-- Delete button -->
              {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
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