@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <header  >
              
              <ol class="breadcrumb" style="margin-bottom:2px; background:#eeeeee">
           <li><i class="fa fa-home"></i><a href="#">Thống kê</a></li>
           <li><i class="fa fa-table"></i>Báo cáo doanh thu</li>
           
         
         </ol>
          
           </header>
          </div>
        </div>

        <div class="row" style="margin-left:50px;">
            <!-- chart morris start -->
            <p class="title_thongke"><center style="font-size:20px; color:red;">Thống kê doanh thu</center></p>
          <form autocomplete="off">
           @csrf
           <div class="col-md-2">
           <p>Từ ngày: <input type="text" id="datepicker3" class="form-control"></p>
           <a  onclick="searchDT()" class="btn btn-primary btn-sm" >Tìm kiếm</a></p>
           </div>
           <div class="col-md-2">
           <p>Đến ngày: <input type="text" id="datepicker4" class="form-control"></p>
           </div>
           <div class="col-md-2">
          <p>
                Lọc theo: 
                <select class="loc-theo form-control">
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
        <!-- page start-->
        <div class="row">
        <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:20px;">
                            <div id="loadtb">
                                <table class="table table-bordered table-hover tablesorter" id="example"  >
                                    <thead style="background:#EFEFEF;">
                                        <tr align="center">
                                            <th >Id</th>
                                            <th >Ngày</th>
                                            <th >Số lượng vật tư</th>
                                            <th>Số đơn hàng</th>
                                            <th >Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doanhthu as $val)
                                        <tr align="center">
                                            <td>{!! $val->id !!}</td>
                                            <td>{!! $val->date !!}</td>
                                            <td>{!! $val->SoLuong !!}</td>
                                            <td>{!! $val->SoDon !!}</td>
                                            <td>{!! number_format($val->TongTien) !!} VNĐ</td>
                            
                                        </tr>
                                          @endforeach  
                                      
                                    </tbody>
                                   
                                </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <!-- page end-->
      </section>
    </section>
@endsection
@section('script')
<script type="text/javascript">
 
 function searchDT(){
     

     var _token = $('input[name="_token"]').val();
     var from_date = $("#datepicker3").val();
     var to_date = $("#datepicker4").val();
     $.ajax({
       url: "qlkho/thongke/filter-day",
       type: "POST",
       data: {from_date: from_date, to_date: to_date, _token:_token},
     }).done(function(response)
       {
          $("#loadtb").empty();
          $("#loadtb").html(response);
       }
     )
};
$('.loc-theo').change(function()
{
  var dasboard_value = $(this).val();
  var _token = $('input[name="_token"]').val();
  //alert(dasboard_value);

  $.ajax({
    url: "qlkho/thongke/timkiemtheo",
    type: "POST",
    data: {dasboard_value:dasboard_value, _token:_token},
  }).done(function(response)
    {
      $("#loadtb").empty();
         $("#loadtb").html(response);
    });
  });

    $("#datepicker3").datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );

    $("#datepicker4").datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );
</script>
@endsection