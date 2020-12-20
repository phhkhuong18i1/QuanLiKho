<header class="header dark-bg" style="background: #eeeeee; border:1px solid white;  position:unset; color:red" >
     

      <!--logo start-->
      <a href="qlkho/baocao/tonkho" class="logo"><b>Thống Kê</b></a>
      <!--logo end-->
     
   <?php 
   $countkho = DB::table('khovt')->count();
  $countnvt = DB::table('nhomvattu')->count();
  $countnpp = DB::table('nhaphanphoi')->count();
   ?>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="" >
                            <label><b> Kho</b></label>
                           
                        </a>
            <ul class="dropdown-menu extended tasks-bar">
            
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">Có {{$countkho}} kho</p>
              </li>
              @foreach($kho as $k)
              <li>
                <a href="qlkho/baocao/khohang/{{$k->id}}">
                  <div class="task-info">
                    <div class="desc">{{$k->kho_ten}} </div>
                  </div>
                </a>
              </li>
            @endforeach
            </ul>
          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                           <label><b> nhóm vật tư</b></label>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">Có {{$countnvt}} nhóm vật tư</p>
              </li>
              @foreach($nhomvattu as $nvt)
              <li>
                <a href="qlkho/baocao/nhomvt/{{$nvt->id}}">
                                    
                <div class="task-info">
                    <div class="desc">{{$nvt->nvt_ten}} </div>
                  </div>
                                  
                                </a>
              </li>
          @endforeach
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

            <label><b> Nhà Phân Phối</b></label>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">Có {{$countnpp}} nhà phân phối</p>
              </li>
              @foreach($nhaphanphoi as $npp)
              <li>
                <a href="qlkho/baocao/npp/{{$npp->id}}">
                <div class="task-info">
                    <div class="desc">{{$npp->npp_ten}} </div>
                  </div>
                                   
                                </a>
              </li>
            @endforeach
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
       
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>