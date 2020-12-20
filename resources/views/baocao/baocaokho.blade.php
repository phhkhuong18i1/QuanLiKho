@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <header  >
              
              <ol class="breadcrumb" style="margin-bottom:2px; background:#eeeeee">
           <li><i class="fa fa-home"></i><a href="qlkho/baocao/tonkho">Thống kê</a></li>
           <li><i class="fa fa-table"></i>Báo cáo theo kho</li>
           
         
         </ol>
          
           </header>
         @include('layout.header1')
          </div>
        </div>
        <!-- page start-->
        <div class="row">
        <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><center><h1><b>Tồn kho theo kho</b></h1></center></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:20px;">
                                <table class="table table-bordered table-hover tablesorter" id="example">
                                    <thead style="background:#EFEFEF;">
                                    <tr >
                                    
                                            <td align="center" colspan="7" style="color:red; font-size: 20px"><b>Kho hàng: {!! $khovt->kho_ten !!} | Tồn: {!! $tongsl !!} | Tổng giá trị: {!! number_format($tongtien[0]->thanhtien)  !!} vnđ </b></td>
                                       
                                    
                                    <td  align="right"> 
                                        <div >
                                             <a href="qlkho/baocao/inkho/{{$khovt->id}}" class="btn btn-warning">
                                             <i class="fa fa-file-pdf-o fa-fw"></i>Xuất file PDF
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                        <tr>
                                            <th class="span2">Mã VT</th>
                                            <th class="span4">Tên VT</th>
                                            <th class="span2">ĐVT</th>
                                            <th class="span2">SL nhập</th>
                                            <th class="span2">SL xuất</th>
                                            <th class="span2">SL tồn</th>
                                            <th class="span2"  align="right">Đơn giá</th>
                                            <th class="span3"  align="right">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                       
                                        @foreach ($vattukho as $val)
                                        <tr align="right">
                                            <td>{!! $val->id !!}</td>
                                            <td>{!! $val->vt_ten !!}</td>
                                            <td>{!! $val->dvt_ten !!}</td>
                                            <td>{!! $val->soluong_nhap !!}</td>
                                            <td>{!! $val->soluong_xuat !!}</td>
                                            <td>{!! $val->soluong_ton !!}</td>
                                            <td align="right">{!! number_format($val->giatien)  !!}</td>
                                            <td align="right">{!! number_format($val->giatien*$val->soluong_ton)  !!}</td>
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