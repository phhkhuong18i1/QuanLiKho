@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <header  >
              
              <ol class="breadcrumb" style="margin-bottom:2px; background:#eeeeee">
           <li><i class="fa fa-home"></i><a href="qlkho/baocao/tonkho">Thống kê</a></li>
           <li><i class="fa fa-table"></i>Tồn kho theo nhà phân phối</li>
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
                <p><center><h1><b>Tồn kho theo nhà phân phối</b></h1></center></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:auto;" >
                                <table class="table table-bordered table-hover tablesorter" id="example"  style="width:100%">
                                    <thead style="background:#EFEFEF;">
                                    <tr >
                                    <td align="center" colspan="7" style="color:red;font-size: 20px"><b>Nhà phân phối: {!! $nhapp->npp_ten !!} | SL vật tư: {{$count}} | Tổng giá trị: {!! number_format($tong)  !!} vnđ</b></td>
                                   
                                    <td  align="right"> 
                                        <div >
                                             <a href="qlkho/baocao/innpp/{{$nhapp->id}}" class="btn btn-warning">
                                             <i class="fa fa-file-pdf-o fa-fw" target="_blank"></i>Xuất file PDF
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
                                            <th class="span2">Đơn giá</th>
                                            <th class="span3">Tổng giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                  
                                       
                                        @foreach ($vattu as $val)
                                        <tr >
                                            <td>{!! $val->id !!}</td>
                                            <td>{!! $val->vt_ten !!}</td>
                                            <td>{!! $val->dvt_ten !!}</td>
                                            <td>{!! $val->nhap !!}</td>
                                            <td>{!! $val->xuat !!}</td>
                                            <td>{!! $val->ton !!}</td>
                                            <td align="right">{!! number_format($val->giatien)  !!}</td>
                                            <td align="right">{!! number_format($val->giatien*$val->ton,0,".",",")  !!}</td>
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