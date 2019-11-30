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
              <!-- MESSAGES -->
              <div class="container-fluid">
                @include('inc.messages')
              </div>
              <!-- END MESSAGES -->

              <!-- Edit Employee Form -->
              <div class="col-md-12">
                <h1>Edit Employee</h1>
                {{ Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) }}

                <div class='form-group'>
                  {{ Form::label('name', 'Name') }}
                  {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>

                <div class='form-group'>
                  {{ Form::label('email', 'Email') }}
                  {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Enter email..']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
              </div>
              <!-- End Edit Employee Form -->

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