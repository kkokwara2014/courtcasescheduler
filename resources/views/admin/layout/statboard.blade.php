@include('admin.layout.statboardcontainer')
<!-- Small boxes (Stat box) -->
<section class="content">
  <div class="row">
    @if (Auth::user()->role->id==1||Auth::user()->role->id==2)
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
          <h3>0</h3>
  
            <p>Location</p>
          </div>
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
          <div class="inner">
          <h3>9</h3>
  
            <p>Equipment</p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>2</h3>
  
            <p>Service Reports</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-pdf-o"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>1</h3>
  
            <p>Staff</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
    </div>

    @endif
  </div>
</section>
<!-- /.row -->