<div class="col-md-6">
  <!-- TIMELINE -->
  <div class="panel panel-scrolling">
    <div class="panel-heading">
      <h3 class="panel-title">Recent User Activity</h3>
      <div class="right">
        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
      </div>
    </div>
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 430px;"><div class="panel-body" style="overflow: hidden; width: auto; height: 430px;">
      <ul class="list-unstyled activity-list">
        @if(count($summaries) > 0)
          @foreach($summaries as $summary)
            <li>
              <img src="assets/img/user1.png" alt="Avatar" class="img-circle pull-left avatar">
              <p><a href="#">{{$summary->employee_id}}</a> {!!$summary->body!!} <span class="timestamp">{{$summary->created_at}}</span></p>
            </li>
          @endforeach
            @else
            <li>
              <h3>No records found</h3>
            </li>
          @endif
      </ul>
      <button type="button" class="btn btn-primary btn-bottom center-block">Load More</button>
    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 18px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 324.386px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
  </div>
  <!-- END TIMELINE -->
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>