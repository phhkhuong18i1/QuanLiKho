@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Xuất kho</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row"> 
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <div class="text-right">
                <a style="margin-left:38px;" class="btn btn-primary" href="qlkho/xuatkho/xuat"><i class="fa fa-plus"></i> Xuất kho</a> 
                 <a href="qlkho/xuatkho/inphieu" class="btn btn-warning">
                                <i class="fa fa-file-pdf-o fa-fw" target="_blank"></i>Xuất file PDF
                            </a>
                        </div>
              </header>

              @if (session('thongbao'))
                    <div class="col-lg-12 alert alert-success">
                        <strong>{{ session('thongbao') }}</strong>
                    </div>
                @endif
                @if (session('loi'))
                    <div class="col-lg-12 alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('loi') }}</strong>
                    </div>
                @endif
                <table class="display table table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center">
                            <th>Mã</th>
                            <th>Lý do xuất</th>
                            <th>Ngày lập</th>
                            <th>Tổng tiền</th>
                            <th>Tên công trình</th>
                            <th>Địa chỉ </th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                            <th>xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pxk as $item)
                            <tr class="odd gradeX" align="center">
                            <td>{{ $item->xk_ma }}</td>
                                <td>{{ $item->xk_lydo }}</td>
                                <td>{{ Carbon\Carbon::parse($item->xk_ngaylap)->format('d-m-Y') }}</td>
                                <td>{{ number_format($item->xk_tongtien) }}</td>
                                <td>
                                    {{ $item->CongTrinh->ten }}
                                </td>
                                <td>{{ $item->congtrinh->diachi }}</td>
                                <td class="center">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa dữ liệu này?')" class="btn btn-danger" href="qlkho/xuatkho/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/xuatkho/sua/{{$item->id}}">
                                        <i class="fa fa-pencil fa-fw"></i>Sửa
                                    </a>
                                </td>
                                <td class="center">
                                <a  class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"  data-id="{{$item->id}}"><i class="fa fa-eye"></i> xem</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
          </div>
        </div>

<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Phiếu xuất kho</h5>
        
      </div>
      <div class="modal-body">
     <div id="modal-body1">
    <hr>
    <center><h2><b>Chi tiết phiếu xuất kho</b></h2></center>
    <table id="table1" >
    <tr>
        <td width="120px" ><strong>Mã:</strong></td> <td></td>
        <td><strong></td>
      </tr>
      <tr >
        <td width="120px"><strong>Nhân viên lập phiếu:</strong></td> <td class='nv'></td>
        <td><strong></td>
      </tr>
      <tr id="tr2">
        <td width="120px"><strong>Lý do xuất:</strong></td> <td id="lydo"></td>
        <td><strong></td>
      </tr>
      <tr id="tr3">
        <td width="120px"><strong>Công trình:</strong></td> <td id='ct'></td>
        <td><strong></td>
      </tr>
      <tr id="tr4">
        <td width='120px'><strong>Địa chỉ:</strong></td> <td ></td>
        <td></td>
      </tr>
    </table><br><br>
       <table  cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="200px"><strong>Thành tiền</strong></td>
          <td style="border:thin solid;" width="200px"><strong>Kho</strong></td>
        </tr>
      </thead>
      <tbody id="table2" >
            
            <tr >
              <td ></td>
              <td >  
              </td>
              <td  ></td>
              <td  >
              </td>
    
              <td   > </td>
              <td   > </td>
          </tr>
            
            
      </tbody>
    </table>
    <table class="sumary-table">
      <tr id="tongtien">
        <td width="365px" >Tổng giá trị xuất</td>
        <td ></td>
      </tr>
    </table><br>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <a herf="qlkho/xuatkho/in" class="btn btn-primary">In</a>
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
    $('#exampleModal').on('shown.bs.modal', function (e) {
             
        var id = $(e.relatedTarget).attr('data-id');
       // $(this).find('.xkid').text(id);
        $.ajax({
            type:'GET',
            url:'qlkho/xuatkho/xem',
            data: {
                ID: id,
            },
            success: function(response)
            {
                
                render1(response);
                
           
            }

        });
      
      });


  
</script>
@include('layout.script')
 @endsection