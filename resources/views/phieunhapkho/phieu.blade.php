<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Phiếu nhập kho</title>
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
    				<center>PHIẾU NHẬP KHO</center>
    				<center>Ngày lập phiếu: {{$nhapkho->ngaylap}}</center>
    			</th>
    			<th width="50px">
    				<center>Số : {{$nhapkho->ma}}</center>
    			</th>
    		</tr>
    	</thead>
    	
    </table>
    </div>
    <hr>
    <center><h2>PHIẾU NHẬP KHO</h2></center>
    <table>
      <tr>
        <td width="120px"><strong>Nhân viên lập phiếu:</strong></td> <td>{!!$nv->nv_ten!!}</td>
        <td><strong></td>
      </tr>
      <tr>
        <td width="120px"><strong>Lý do nhập:</strong></td> <td>{!!$nhapkho->lydo!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Nhập từ:</strong></td> <td>{!!$npp->npp_ten!!}</td>
        <td></td>
      </tr>
    </table><br><br>
       <table cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="30px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="50px"><strong>ĐVT</strong></td>
          <td style="border:thin solid;" width="120px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="120px"><strong>Thành tiền</strong></td>
          <td style="border:thin solid;" width="200px"><strong>Kho</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0; ?>
            @foreach ($chitiet as $val)
            <tr >
              <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
                  <?php  
            
                      $vt = DB::table('vattu')->where('id',$val->vt_id)
                      ->first();
                      $dvt = DB::table('donvitinh')->where('id',$vt->donvitinh_id)->first();
                      print_r($vt->vt_ten);
                  ?>
              </td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $val->ctnk_soluong !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $dvt->dvt_ten !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {!! number_format($vt->giatien) !!} vnđ 
              </td>
              
              <td  style="border:thin blue solid;border-style:dashed;" >{!! number_format($val->ctnk_thanhtien) !!} vnđ </td>
              <td style="border:thin blue solid;border-style:dashed;" >{!! $val->kho->kho_ten !!}  </td>
          </tr>
            @endforeach
            
      </tbody>
    </table>
    <table class="sumary-table">
      <tr>
        <td width="438px">Tổng giá trị nhập</td>
        <td  width="180px">{!! number_format($nhapkho->tongtien) !!} vnđ</td>
      </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
      <tr>
      <td width="200px"></td>
        <td width="200px"></td>
        
        <td  >Nhập,Ngày lập: <?php echo date("d-m-Y") ?></td>
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
    
