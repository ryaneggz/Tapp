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

              <!-- Summary Form -->
              <div class="col-md-12">
                <h1>Edit Post</h1>
                {{ Form::open(['action' => ['SummariesController@update', $summary->id], 'method' => 'POST']) }}

                  <div class='form-group'>
                    {{ Form::label('employee', 'Employee') }}
                    {{ Form::text('employee_id', $summary->employee_id, ['class' => 'form-control', 'placeholder' => 'Employee ID']) }}
                  </div>

                  <div class='form-group'>
                    {{ Form::label('employee', 'Employee Name') }}
                    {{ Form::text('employee_name', $summary->employee_name, ['class' => 'form-control', 'placeholder' => 'Employee Name']) }}
                  </div>

                  <div class='form-group'>
                    {{ Form::label('body', 'Body') }}
                    {{ Form::textarea('body', $summary->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
                  </div>
                  {{ Form::hidden('_method', 'PUT') }}
                  {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
              </div>
              <!-- End Summary Form -->

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