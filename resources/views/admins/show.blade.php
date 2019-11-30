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
              <a href="/admins" class="btn btn-default">Go Back</a>
              <h2>This is the Admin ID: {{$admin->id}}</h2>
              <h3>User ID: {{$admin->user_id}}</h3>
              <h3>User Name: {{$admin->user->name}}</h3>
              <h3>Created on: {{$admin->created_at}}</h3>
              <h3>Updated on: {{$admin->updated_at}}</h3>
              <hr>
              {!!Form::open(['action' => ['AdminsController@destroy', $admin->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
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