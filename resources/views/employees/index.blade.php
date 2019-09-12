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
            <!-- MESSAGES -->
            <div class="container">
              @include('inc.messages')
            </div>
            <!-- END MESSAGES -->

            <div class="container-fluid">
              <div class="col-sm-12">

                <!-- TABLE HOVER -->
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">Employees</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr><th>#</th><th>Employee Name</th><th>Card Number</th><th>Created At</th></tr>
                      </thead>
                      <tbody>
                        @if(count($employees) > 0)
                          @foreach($employees as $employee)
                            
                          <tr onClick='window.location.href="/employees/{{$employee->id}}";'>
                            <th scope='row'>{{$employee->id}}</th><td>{{$employee->user->name}}</td><td>{{$employee->card_number}}</td><td>{{$employee->created_at}}</td>
                          </tr>
                            
                          @endforeach
                          {{$employees->links()}}
                        @else
                          <p>No employees found</p>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- END TABLE HOVER -->
      
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