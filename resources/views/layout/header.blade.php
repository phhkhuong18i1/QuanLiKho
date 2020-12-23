<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="qlkho/index" class="logo">Khuong <span class="lite">Phan</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          @if(Auth::check())
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      
                            <span class="fa fa-user"> {{Auth::user()->name}}</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="qlkho/nhanvien/thongtin"><i class="icon_profile"></i> Thông tin</a>
              </li>
              <li>
                <a href="qlkho/nhanvien/doimatkhau"><i class="icon_pencil_alt"></i> Đổi mật khẩu</a>
              </li>
              <li>
                <a href="qlkho/dangxuat"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          @endif
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>