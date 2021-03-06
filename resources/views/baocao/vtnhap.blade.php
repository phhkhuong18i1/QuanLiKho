@extends('layout.index')
@section('content')

<section id="main-content">

      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12"> 
           
          </div>
        </div>
        <!-- page start-->
        <div class="row" >
        <div class="row">
        <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><center style="font-size:25px"><b>Thống kê vật tư nhập vào</b></h1></center>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:auto;" >
                                <table class="display table table-bordered table-hover " id="example"  style="width:100%">
                                    <thead style="background:#EFEFEF;">
                                   
                                        <tr>
                                            <th class="span2">Mã </th>
                                            <th class="span4">Tên VT</th>
                                            <th class="span2">Kho</th>
                                            <th class="span2">Ngày nhập</th>
                                            <th class="span2">Số lượng</th>
                                            <th class="span2">Đơn vị tính</th>
                                            <th class="span2">Đơn giá</th>
                                            <th class="span3">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                  
                                       
                                    @foreach ($ctnk as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{ $item->vattu->vt_ten }}</td>
                                <td>{{ $item->kho->kho_ten }}</td>
                                <td>{{ $item->phieunhapkho->ngaylap }}</td>
                                <td>{{ $item->ctnk_soluong }}</td>
                                <td><?php
                                $dvt = DB::table('donvitinh')->where('id',$item->vattu->donvitinh_id)->first();
                                print_r($dvt->dvt_ten);
                                 ?></td>
                                <td>{{ number_format($item->vattu->gianhap) }} VNĐ</td>
                                <td>{{ number_format($item->ctnk_soluong*$item->vattu->gianhap) }} VNĐ</td>
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
         
      </section>
    </section>
@endsection