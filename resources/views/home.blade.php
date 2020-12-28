@extends('layout.index')
@section('content')

<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <?php
              use App\VatTuKho;
              use App\VatTu;
              $count = 0;
              $vattu = VatTuKho::join('vattu','vattu.id','=','vattukho.vattu_id')
              ->select(
                'vattukho.soluong_nhap','vattukho.soluong_xuat',
                'vattukho.soluong_ton',
                'vattu.id','vattu.vt_ten',
                'vattu.giatien','vattu.created_at'
                )
            ->get();
             
               $tongslnhap = VatTuKho::sum('soluong_nhap');
               $tongslxuat = VatTuKho::sum('soluong_xuat');
               $tongslton = VatTuKho::sum('soluong_ton');
               $tongtien = DB::table('vattukho')
                 ->join('vattu','vattu.id','=','vattukho.vattu_id')
                  ->select(DB::raw('sum(vattukho.soluong_xuat*vattu.giatien) as thanhtien') )
                ->get();
              ?>
              <div class="count">
              {{ $tongslnhap}}
              </div>
              <div class="title">Số lượng nhập</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">{{$tongslxuat}}</div>
              <div class="title">Số lượng xuất</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">{{$tongslton}}</div>
              <div class="title">Số lượng tồn</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-money"></i>
              <div style="font-size: 17px;" class="count">{!! number_format($tongtien[0]->thanhtien)!!} </div>
              <div class="title">Tổng doanh thu</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        
        

        </div>
        <!--/.row-->




        <div class="row">
            <!-- chart morris start -->
          <p class="title_thongke"><center style="font-size:20px; color:red;">Thống kê doanh số</center></p>
          <form autocomplete="off">
           @csrf
           <div class="col-md-2">
           <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
           <input type="button" id="btn-dasboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
           </div>

           <div class="col-md-2">
           <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
           </div>
                
          <div class="col-md-2">
          <p>
                Lọc theo: 
                <select class="dasboard-filter form-control">
                <option>>------chọn------<</option>
                <option value="7ngay">7 ngày</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>
                <option value="365ngayqua">365 ngày qua</option>
                </select>
          </p>
          </div>
          </form>
          </div>
          <div class="col-md-12">
              <div id="myfirstchart" style="heigth: 250px;"></div>
          </div>

        


        <!-- statics end -->




      </section>
    </section>
@endsection