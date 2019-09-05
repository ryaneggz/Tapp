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
              <a href="/summaries" class="btn btn-default">Go Back</a>
              <h1>This is the Summary ID: {{$summary->id}}</h1>
              <h3>Employee ID: {{$summary->employee_name}}</h3>
              <h3>Summary: {!!$summary->body!!}</h3>
              <h3>Created on: {{$summary->created_at}}</h3>
              <!-- Edit button -->
              <a href="/summaries/{{$summary->id}}/edit" class="btn btn-default">Edit</a>
              <!-- Delete button -->
              {!!Form::open(['action' => ['SummariesController@destroy', $summary->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
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