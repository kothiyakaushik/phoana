<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php
          $route = Route::currentRouteName();
        ?>
        <li class="{{($route == 'dashboard') ? 'active' : ''}} treeview">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="{{($route == 'getAdminUserListing') ? 'active' : ''}} treeview">
          <a href="{{route('getAdminUserListing')}}">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>
        <li class="{{($route == 'getAdminListCategories' || $route == 'getAdminListSubCategories' || $route == 'getAdminListSubsubCategories') ? 'active' : ''}} treeview">
          <a href="">
            <i class="fa fa-bars"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{($route == 'getAdminListCategories') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListCategories')}}">
                  <i class="fa fa-chevron-right"></i> <span>Main Categories</span>
                </a>
              </li>
              <li class="{{($route == 'getAdminListSubCategories') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListSubCategories')}}">
                  <i class="fa fa-chevron-right"></i> <span>Sub Categories Level-1</span>
                </a>
              </li>
              <li class="{{($route == 'getAdminListSubsubCategories') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListSubsubCategories')}}">
                  <i class="fa fa-chevron-right"></i> <span>Sub Categories Level-2</span>
                </a>
              </li>
          </ul>
        </li>
        
        <li class="{{($route == 'getAdminListServices' || $route == 'getAdminListSubServices' || $route == 'getAdminListServiceQuestions' || $route == 'getAdminListQuestionSet') ? 'active' : ''}} treeview">
          <a href="">
            <i class="fa fa-bars"></i> <span>Services & Questions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{($route == 'getAdminListServices') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListServices')}}">
                  <i class="fa fa-suitcase"></i> <span>Main Services</span>
                </a>
              </li>
              <li class="{{($route == 'getAdminListSubServices') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListSubServices')}}">
                  <i class="fa fa-suitcase"></i> <span>Sub Services</span>
                </a>
              </li>
              <li class="{{($route == 'getAdminListServiceQuestions') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListServiceQuestions')}}">
                  <i class="fa fa-question-circle"></i> <span>Services Questions</span>
                </a>
              </li>
              <li class="{{($route == 'getAdminListQuestionSet') ? 'active' : ''}} treeview">
                <a href="{{route('getAdminListQuestionSet')}}">
                  <i class="fa fa-pencil-square"></i> <span>Question Set</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="{{($route == 'getAdminListInquires') ? 'active' : ''}} treeview">
          <a href="{{route('getAdminListInquires')}}">
            <i class="fa fa-support"></i> <span>Customer support</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>