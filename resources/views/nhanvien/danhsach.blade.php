@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Nhân viên</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              </header>
              @if (session('loi'))
                        <div class="alert alert-danger">
                            <strong>{{ session('loi') }}</strong>
                        </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{ session('thongbao') }}</strong>
                        </div>
                    @endif
              <table class="display table table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center">
                           
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Giới tính</th>
                            <th>CMND</th>
                            <th>Địa chỉ</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nhanvien as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->nhanvien->nv_ten }}</td>
                                <td>{{ $item->nhanvien->email}}</td>
                                <td>{{  $item->nhanvien->nv_sdt  }} </td>
                                <td> @if($item->nhanvien->GioiTinh == 1)
                                    {{"Nam"}}
                                    @else
                                    {{"Nữ"}}
                                    @endif</td>
                               <td>{{$item->nhanvien->CMND}}</td>
                               <td> {{$item->nhanvien->nv_diachi}}</td>
                                <td class="center">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa dữ liệu này?')" class="btn btn-danger" href="qlkho/nhanvien/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/nhanvien/sua/{{ $item->id }}">
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
        <!-- page end-->
      </section>
    </section>
@endsection