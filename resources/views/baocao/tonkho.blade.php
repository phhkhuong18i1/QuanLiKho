@extends('layout.index')
@section('content')

<section id="main-content">

      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12"> 
            @include('layout.header1')
          </div>
        </div>
        <!-- page start-->
        <div class="row" >
        <div class="row">
        <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><center><h1><b>Tồn kho tổng hợp</b></h1></center></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:auto;" >
                                <table class="display table table-bordered table-hover " id="example"  style="width:100%">
                                    <thead style="background:#EFEFEF;">
                                    <tr >
                                   
                                   
                                    <td  align="right" colspan="9"> 
                                        <div >
                                             <a href="qlkho/vattu/inton" class="btn btn-warning">
                                             <i class="fa fa-file-pdf-o fa-fw" target="_blank"></i>Xuất file PDF
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                        <tr>
                                            <th class="span2">Mã VT</th>
                                            <th class="span4">Tên VT</th>
                                            <th class="span2">ĐVT</th>
                                            <th class="span2">Kho</th>
                                            <th class="span2">SL nhập</th>
                                            <th class="span2">SL xuất</th>
                                            <th class="span2">SL tồn</th>
                                            <th class="span2">Đơn giá</th>
                                            <th class="span3">Tổng giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                  
                                       
                                    @foreach ($vattukho as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{ $item->vt_ten }}</td>
                                <td>{{ $item->dvt_ten }}</td>
                                <td>{{ $item->kho_ten }}</td>
                                <td>{{ $item->soluong_nhap }}</td>
                                <td>{{ $item->soluong_xuat }}</td>
                                <td>{{ $item->soluong_ton }}</td>
                                <td>{{ number_format($item->giatien) }}</td>
                                <td>{{ number_format($item->soluong_ton*$item->giatien) }}</td>
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