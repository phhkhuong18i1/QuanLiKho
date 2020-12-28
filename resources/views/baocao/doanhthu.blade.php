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
            <p class="title_thongke"><center style="font-size:20px; color:red;">Thống kê doanh số</center></p>
          <form autocomplete="off">
           @csrf
           <div class="col-md-2">
           <p>Từ ngày: <input type="text" id="datepicker3" class="form-control"></p>
           <input type="button" id="btn-doanhthu-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
           </div>
           <div class="col-md-2">
           <p>Đến ngày: <input type="text" id="datepicker4" class="form-control"></p>
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
                                <table class="table table-bordered table-hover tablesorter" id="example" >
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
                                            <td>{!! $val->TongTien !!} VNĐ</td>
                            
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
<script>
$(document).ready(function()
{
$("#btn-doanhthu-filter").click(function(){
     

     var _token = $('input[name="_token"]').val();
     var from_date = $('#datepicker3').val();
     var to_date = $('#datepicker4').val();
     $.ajax({
       url: "qlkho/thongke/filter-day",
       type: "POST",
       data: {from_date: from_date, to_date: to_date, _token:_token},
     }).done(function(response)
       {
          $("#example").empty();
          $("#example").html(response);
       }
     )
});
});

</script>
@endsection