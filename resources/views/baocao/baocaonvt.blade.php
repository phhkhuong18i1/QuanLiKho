@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <header  >
              
              <ol class="breadcrumb" style="margin-bottom:2px; background:#eeeeee">
           <li><i class="fa fa-home"></i><a href="qlkho/baocao/tonkho">Thống kê</a></li>
           <li><i class="fa fa-table"></i>Tồn kho theo nhóm vật tư</li>
          
         
         </ol>
          
           </header>
         @include('layout.header1')
         
          </div>
        </div>
        <!-- page start-->
        <div class="row">
        <div  class="span13">
        <div class="box">
            <div class="box-header" style="margin-left: 50px;">
                <p><center><h1><b>Tồn kho theo nhóm vật tư</b></h1></center></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:20px;">
                            <table class="display table table-bordered table-hover" id="example">
                                    <thead style="background:#EFEFEF;">
                                    <tr >
                                    <td align="center" colspan="7" style="color:red; font-size: 20px"><b>Nhóm vật tư: {!! $nhomvt->nvt_ten !!} | SL vật tư: {{$count}} | Tổng giá trị: {!! number_format($tong[0]->thanhtien)  !!} vnđ</b></td>
                                    <td  align="right"> 
                                        <div >
                                             <a href="qlkho/baocao/in/{{$nhomvt->id}}" class="btn btn-warning">
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
                                            <th class="span2"  align="right">Đơn giá</th>
                                            <th class="span3"  align="right">Tổng giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        
                                        @foreach ($vattu as $val)
                                        <tr  align="right">
                                            <td>{!! $val->id !!}</td>
                                            <td>{!! $val->vt_ten !!}</td>
                                            <td>{!! $val->dvt_ten !!}</td>
                                            <td>{!! $val->nhap !!}</td>
                                            <td>{!! $val->xuat !!}</td>
                                            <td>{!! $val->ton !!}</td>
                                            <td  align="right">{!! number_format($val->giatien)  !!}</td>
                                            <td  align="right">{!! number_format($val->giatien*$val->ton)  !!}</td>
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