@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Nhà phân phối</li>
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
                            <th>Tên nhà phân phối</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Khu vực</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($npp as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->npp_ten }}</td>
                                <td>{{$item->diachi }}</td>
                                <td>{{ $item->sodienthoai }}</td>
                                <td>{{ $item->email }}</td>
                                <td>  {{ $item->khuvuc->kv_ten}}    </td>
                              
                                <td class="center">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa dữ liệu này?')" class="btn btn-danger" href="qlkho/nhaphanphoi/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a  class="btn btn-primary" href="qlkho/nhaphanphoi/sua/{{ $item->id }}">
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