<aside>
      <div id="sidebar" class="nav-collapse " >
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="qlkho/index">
                          <i class="icon_house_alt"></i>
                          <span>Trang chủ</span>
                      </a>
          </li>
     
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Thống kê</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            
              <li><a class="" href="qlkho/baocao/tonkho">Thống kê tồn kho </a></li>
              <li><a class="" href="qlkho/thongke/doanhthu"> Thống kê doanh thu </a></li>
              <li><a class="" href="qlkho/baocao/vtnhap"> Thống kê vật tư nhập </a></li>
              <li><a class="" href="qlkho/baocao/vtxuat"> Thống kê vật tư xuất </a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Chức năng</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="qlkho/nhapkho/danhsach">Nhập kho </a></li>
              <li><a class="" href="qlkho/xuatkho/danhsach"> Xuất kho </a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Danh mục</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="qlkho/vattu/danhsach">Vật tư </a></li>
              <li><a class="" href="qlkho/donvitinh/danhsach">Đơn vị tính </a></li>
              <li><a class="" href="qlkho/congtrinh/danhsach">Công trình </a></li>
              <li><a class="" href="qlkho/kho/danhsach">Kho </a></li>
              <li><a class="" href="qlkho/khuvuc/danhsach">Khu vực </a></li>
              <li><a class="" href="qlkho/nhaphanphoi/danhsach">Nhà phân phối </a></li>
              <li><a class="" href="qlkho/nhasanxuat/danhsach">Nhà sản xuất </a></li>
              <li><a class="" href="qlkho/nhomvattu/danhsach">Nhóm vật tư </a></li>
              <li><a class="" href="qlkho/chatluong/danhsach">Chất lượng </a></li>
            </ul>
          </li>
          @if(Auth::check())
            @if(Auth::user()->role == 1 || Auth::user()->role == 0)
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Nhân viên</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="qlkho/nhanvien/danhsach">Danh sách </a></li>
              <li><a class="" href="qlkho/nhanvien/them">Thêm </a></li>
            </ul>
          </li>
          @endif
          @endif
          <li class="sub-menu">
            <a href="qlkho/lienhe" class="">
                          <i class="fa fa-phone"></i>
                          <span>Liên hệ</span>
                      </a>
          </li>


</ul>
        <!-- sidebar menu end-->
      </div>
    </aside>