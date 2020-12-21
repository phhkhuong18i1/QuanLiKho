@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Nhập kho</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <div class="text-right">
                <a style="margin-left:38px;" class="btn btn-primary" href="qlkho/nhapkho/nhap"><i class="fa fa-plus"></i> Nhập kho </a> 
                            <a href="qlkho/nhapkho/in" class="btn btn-warning">
                                <i class="fa fa-file-pdf-o fa-fw"></i>Xuất file PDF
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
                            <th>Lý do nhập</th>
                            <th>Ngày lập</th>
                            <th>Tổng tiền</th>
                            <th>Nhân viên</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                            <th>In</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pnk as $item)
                            <tr class="odd gradeX" align="center">
                            <td>{{$item->ma}}</td>
                                <td>{{ $item->lydo }}</td>
                                <td>{{ Carbon\Carbon::parse($item->ngaylap)->format('d-m-Y') }}</td>
                                <td>{{ number_format($item->tongtien,0,",",".") }} VNĐ</td>
                                <td>{{$item->nhanvien->nv_ten}}</td>
                                <td class="center">
                                    <a class="btn btn-danger" href="qlkho/nhapkho/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/nhapkho/sua/{{ $item->id }}">
                                        <i class="fa fa-pencil fa-fw"></i>Sửa
                                    </a>
                                </td>
                                <td class="center">
                                <a  class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"  data-id="{{$item->id}}"><i class="fa fa-eye"></i> xem</a>
                                    </a>
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
        <h5 class="modal-title" id="exampleModalLabel">Phiếu nhập kho</h5>
        
      </div>
      <div class="modal-body">
     <div id="modal-body1">
    <hr>
    <center><h2><b>Chi tiết phiếu nhập kho</b></h2></center>
    <table >
    <tr id="tr0">
        <td width="120px" ><strong>Mã:</strong></td> <td ></td>
        <td><strong></td>
      </tr>
      <tr id="tr1">
        <td width="120px"><strong>Nhân viên lập phiếu:</strong></td> <td ></td>
        <td><strong></td>
      </tr>
      <tr id="tr2">
        <td width="120px"><strong>Lý do nhập:</strong></td> <td ></td>
        <td></td>
      </tr>
      <tr id="tr3">
      <td width="120px"><strong>Nhập từ:</strong></td> <td></td>
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
          </tr>
            
            
      </tbody>
    </table>
    <table class="sumary-table">
      <tr id="tongtien">
        <td width="365px" >Tổng giá trị nhập</td>
        <td ></td>
      </tr>
    </table><br>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <a  class="btn btn-primary" href="qlkho/nhap/innhap/">In</a>
        
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
        //$(this).find('.nkid').text(id);
        
        $.ajax({
            type:'GET',
            url:'qlkho/nhapkho/xem',
            data: {
                ID: id,
            },
            success: function(response)
            {
                
                render(response);
                
           
            }

        });
      
      });
      $('#exampleModal').on('hidden.bs.modal', function () { 
        
        $("#modal-body1").val('');
      });
function render(response)
{
  console.log(response);
          var nv_ten,lydo,ma,npp = "";
          var chitiet = response['chitietnk'];
          var ten = chitiet.length;
              nv_ten =  "<td width='120px'><strong>Nhân viên lập phiếu:</strong></td> <td >"+response['nv'].nv_ten+"</td><td><strong></td>";
              lydo = "<td width='120px'><strong>Lý do nhập:</strong></> <td>"+response['nhapkho'].lydo+"</td><td></td>";
              npp = "<td width='120px'><strong>Nhà phân phối:</strong></> <td >"+response['npp'].npp_ten+"</td><td></td>";
              ma =  "<td width='120px'><strong>Mã:</strong></td> <td >"+response['nhapkho'].ma+"</td><td></td>";
                $("#tr1").empty();
                $("#tr1").append(nv_ten);
                $("#tr2").empty();
                $("#tr2").append(lydo);
                $("#tr3").empty();
                $("#tr3").append(npp);
                $("#tr0").empty();
                $("#tr0").append(ma);
                $("#table2").empty();
              for(var i = 0; i<ten; i++)
              { var stt= i+1;
                 var idvt = chitiet[i]['vattu'];
               var txt = "<tr><td style='border:thin blue solid;border-style:dashed;'>"+stt+"</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['vt_ten']+
                "</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctnk_soluong+"</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['giatien']+" VNĐ</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctnk_thanhtien+" VNĐ</td></tr>";
                 $("#table2").append(txt);   
              }
              
             var tt = "<td width='480px'>Tổng giá trị nhập</><td width='200px'>"+response['nhapkho'].tongtien+" VND </td>";

             $("#tongtien").empty();
                $("#tongtien").append(tt);  

              var inphieu = "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button><a  class='btn btn-primary' href='qlkho/nhapkho/innhapkho/"+response['nhapkho'].id+"'>In</a>"
                $(".modal-footer").empty();
                $(".modal-footer").append(inphieu);
}

  
</script>
 @endsection