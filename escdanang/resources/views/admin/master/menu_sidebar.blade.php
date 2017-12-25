 <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('Lib/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="color: white; font-size: 25px;">Main Functions</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li><a href="#"><i class="fa fa-users"></i> <span>Customers</span></a></li>
        <li class="treeview"><a href="#"><i class="fa fa-grav"></i> <span>Partner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
           <ul class="treeview-menu">
            <li><a href="{{url('admin/PT')}}"><i class="fa fa-circle-o"></i>Partners</a></li>
            <li><a href="{{url('admin/RE')}}"><i class="fa fa-circle-o"></i>Recruitments</a></li>
            <li><a href="{{url('admin/TOUR')}}"><i class="fa fa-circle-o"></i>Tours</a></li>
            <li><a href="{{url('admin/PTtype')}}"><i class="fa fa-circle-o"></i>Partner Type</a></li>
          </ul>
        </li>
        <li><a href="{{url('admin/services')}}" id="services"><i class="glyphicon glyphicon-hourglass"></i> <span> Services</span></a></li>
        <li><a href="#"><i class="glyphicon glyphicon-asterisk"></i> <span>Promotions</span></a></li>
        <li><a href="#"><i class="fa fa-question"></i> <span>QAs</span></a></li>
        <li><a href="#"><i class="glyphicon glyphicon-comment"></i> <span>Contacts</span></a></li>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>