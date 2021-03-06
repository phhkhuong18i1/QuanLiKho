@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Kho</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <div class="text-right">
              <a  class="btn btn-primary" href="qlkho/kho/them">Thêm&nbsp;<span class="fa fa-plus"></span></a>
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
                            <th>Tên kho</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Liên hệ</th>
                            <th>Khu vực</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kho as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->kho_ten }}</td>
                                <td>{{$item->kho_sdt}}</td>
                                <td>{{ $item->k_diachi }} </td>
                                <td>{{$item->kho_lienhe}}</td>
                                <td>{{ $item->khuvuc->kv_ten }}</td>
                               
                               
                                <td class="center">
                                <a  class="btn btn-danger" data-toggle="modal" data-target="#exampleModalXoa"  data-id="{{$item->id}}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/kho/sua/{{ $item->id }}">
                                        <i class="fa fa-pencil fa-fw"></i>Sửa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
          </div>
        </div>

        @include('layout.xoa')
        <!-- page end-->
      </section>
    </section>
@endsection
@section('script')
<script>
      $('#exampleModalXoa').on('shown.bs.modal', function (e) {
             
             var id = $(e.relatedTarget).attr('data-id');
            // $(this).find('.xkid').text(id);
             $.ajax({
                 type:'GET',
                 url:'qlkho/kho/xoa',
                 data: {
                     ID: id,
                 },
                 success: function(response)
                 {
                     
                     DeleteK(response);
                 }
     
             });
           
           });
</script>
@include('layout.script')
 @endsection