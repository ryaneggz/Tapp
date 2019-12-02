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
            <!-- MESSAGES -->
            <div class="container">
              @include('inc.messages')
            </div>
            <!-- END MESSAGES -->

            <div class="col-md-12">
                <!-- TIMELINE -->
                <div class="panel panel-scrolling">
                  <div class="panel-heading">
                    <h3 class="panel-title">User Activity</h3>
                    <div class="right">
                      <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                      <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                  </div>
                  <div class="slimScrollDiv" style="position: relative; width: auto; height: 430px;">
                    <div class="panel-body" style="overflow: auto; width: auto; height: 430px;">
                      <ul class="list-unstyled activity-list">
                        @if(count($summaries) > 0)
                          @foreach($summaries as $summary)
                            <li>
                              @if($summary->employee->cover_image)
                                <img src="/storage/cover_images/{{ $summary->employee->cover_image }}" alt="Avatar" class="img-circle pull-left avatar">
                              @else
                                
                              @endif
                              <p><a href="/summaries/{{$summary->id}}">{{$summary->employee->user->name}}</a><br> {!!$summary->body!!} <br><span class="timestamp pull-right">{{$summary->updated_at}}</span></p>
                            </li>
                          @endforeach
                        @else
                          <li>
                            <h3>No records found</h3>
                          </li>
                        @endif
                      </ul>
                    </div>
                  <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 18px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 324.386px;"></div>
                  <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
                </div>
                <!-- END TIMELINE -->
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