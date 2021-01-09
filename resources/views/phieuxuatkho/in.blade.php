@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper" style="margin-left:20px; " >
    <div class="row" >
    
    <hr>
    <p ><center style="font-size:30px; ">PHIẾU XUẤT KHO</center></p>
    <table>
      <tr>
        <td width="150px"><strong>Nhân viên lập phiếu:</strong></td> <td>{!!$nv->nv_ten!!}</td>
        <td><strong></td>
      </tr>
      <tr>
        <td width="150px"><strong>Lý do nhập:</strong></td> <td>{!!$pxk->xk_lydo!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="150px"><strong>Công trình:</strong></td> <td>{!!$ct->ten!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="150px"><strong>Địa chỉ:</strong></td> <td>{!!$ct->diachi!!}</td>
        <td></td>
      </tr>
    </table><br><br>
       <table style="width:1140px;"  class="tb table table-bordered table-hover" id="myTable" name="myTable" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Thành tiền</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Kho</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0; ?>
            @foreach ($chitiet as $val)
            <tr >
              <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              <?php  
                      $vt = DB::table('vattu')->where('id',$val->vattu_id)->first();
                      print_r($vt->vt_ten);
                  ?>
              </td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $val->ctxk_soluong !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {!! number_format($vt->giatien) !!} vnđ 
              </td>
              
              <td style="border:thin blue solid;border-style:dashed;" >{!! number_format($val->ctxk_thanhtien) !!} vnđ </td>
              <td style="border:thin blue solid;border-style:dashed;" >{!! $val->kho->kho_ten !!}  </td>
          </tr>
            @endforeach
            
      </tbody>
    </table>
    <table class="sumary-table">
      <tr>
        <td width="455px">Tổng giá trị nhập</td>
        <td width="280px" align="right">{!! number_format($pxk->xk_tongtien) !!} vnđ</td>
      </tr>
    </table><br>
    <div >
    <center style="font-size:20px"><a  class="btn btn-primary"  target='_blank' href='qlkho/xuatkho/in/{{$pxk->id}}'>In</a>
    <a href="qlkho/xuatkho/xuat" class="btn btn-warning" >Hủy</a> </center>
    </div>
    </div>
    </section>
    </section>
    @endsection
    
