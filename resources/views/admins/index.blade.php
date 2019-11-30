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
                    <h3 class="panel-title">Admins</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr><th>#</th><th>Admin Name</th><th>Created At</th></tr>
                      </thead>
                      <tbody>
                        @if(count($admins) > 0)
                          @foreach($admins as $admin)
                            
                          <tr onClick='window.location.href="/admins/{{$admin->id}}";'>
                            <th scope='row'>{{$admin->id}}</th><td>{{$admin->user->name}}</td><td>{{$admin->created_at}}</td>
                          </tr>
                            
                          @endforeach
                          {{$admins->links()}}
                        @else
                          <tr>No admins found</tr>
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