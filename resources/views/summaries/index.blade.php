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
              @if(count($summaries) > 0)
                @foreach($summaries as $summary)
                  <div class="well col-sm-12">
                    <h3><a href="/summaries/{{$summary->id}}">{{$summary->employee->user->name}}</a></h3>
                    <small>Written on {{$summary->created_at}}</small><br>
                    <small>Updated on {{$summary->updated_at}}</small>
                  </div>
                @endforeach
                {{$summaries->links()}}
              @else
                <p>No Summaries found</p>
              @endif
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