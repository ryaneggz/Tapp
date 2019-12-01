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

              <!-- Employee Form -->
              <div class="col-md-12">
                <h1>Create Employee</h1>
                {{ Form::open(['action' => 'EmployeesController@store', 'method' => 'POST']) }}

                  <div class='form-group'>
                    {{ Form::label('user_id', 'Select User') }}
                    <select class="form-control" name="user_id" placeholder="Select User">
                      @foreach($users as $user)
                        <option value={{$user->id}}>{{$user->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class='form-group'>
                    {{ Form::label('card_number', 'Card Number') }}
                    {{ Form::text('card_number', '', ['class' => 'form-control', 'placeholder' => 'Enter card number..']) }}
                  </div>

                  <div class='form-group'>
                    {{ Form::label('color', 'Hex Color') }}
                    {{ Form::text('color', '', ['class' => 'form-control', 'placeholder' => '#000000']) }}
                  </div>

                  {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
              </div>
              <!-- End Employee Form -->

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