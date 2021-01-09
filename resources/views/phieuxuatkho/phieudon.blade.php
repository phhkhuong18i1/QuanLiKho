<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Phiếu xuất kho</title>
    <style>
      body{
        font-family: DejaVu Sans, sans-serif, font-size: 10px;
      }
    </style>
  </head>
  
  <body >
    <div>
    <table>
    	<thead>
    		<tr>
    			<th width="200px">
    			CÔNG TY TNHH MTV KHUONG PHAN
    			
    			</th>
    			<th width="300px">
    				<center>PHIẾU XUẤT KHO</center>
    				<center>Ngày lập phiếu: {{$xuatkho->xk_ngaylap}}</center>
    			</th>
    			<th width="50px">
    				<center>Mã : {{$xuatkho->xk_ma}}</center>
    			</th>
    		</tr>
    	</thead>
    	
    </table>
    </div>
    <hr>
    <center><h2>PHIẾU XUẤT KHO</h2></center>
    <table>
      <tr>
        <td width="120px"><strong>Nhân viên lập phiếu:</strong></td> <td>{!!$nv->nv_ten!!}</td>
        <td><strong></td>
      </tr>
      <tr>
        <td width="120px"><strong>Lý do nhập:</strong></td> <td>{!!$xuatkho->xk_lydo!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Công trình:</strong></td> <td>{!!$ct->ten!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Địa chỉ:</strong></td> <td>{!!$ct->diachi!!}</td>
        <td></td>
      </tr>
    </table><br><br>
       <table cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Thành tiền</strong></td>
          <td style="border:thin solid;" width="200px"><strong>Xuất từ kho</strong></td>
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
        <td width="440px">Tổng giá trị nhập</td>
        <td width="200px">{!! number_format($xuatkho->xk_tongtien) !!} vnđ</td>
      </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
      <tr>
      <td width="200px"></td>
        <td width="200px"></td>
        
        <td  >Xuất,Ngày lập: <?php echo date("d-m-Y") ?></td>
      </tr>
      <tr>
        <td width="250px" class="customer-title"> </td>
        <td width="250px" class="customer-title"> </td>
       
        
        <td width="250px" class="writer-title"><strong>Thủ kho</strong></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        
      
        <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
      </tr>
    </table>
  </body>
</html>
    
