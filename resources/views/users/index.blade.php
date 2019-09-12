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

            <div class="container">
              <div class="col-sm-12">

                <!-- TABLE HOVER -->
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr><th>#</th><th>User</th><th>Email</th><th>Employee ID</th><th>Created at</th></tr>
                      </thead>
                      <tbody>
                        @if(count($users) > 0)
                          @foreach($users as $user)
                            
                          <tr onClick='window.location.href="/users/{{$user->id}}";'>
                            <th scope='row'>{{$user->id}}</th><td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->employee_id}}</td><td>{{$user->created_at}}</td>
                          </tr>
                            
                          @endforeach
                          {{$users->links()}}
                        @else
                          <p>No users found</p>
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