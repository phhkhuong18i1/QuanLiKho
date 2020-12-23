@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Nhà sản xuất</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <div class="text-right">
              <a  class="btn btn-primary" href="qlkho/nhasanxuat/them">Thêm&nbsp;<span class="fa fa-plus"></span></a>
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
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Khu vực</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nsx as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->nsx_ma }}</td>
                                <td>{{  $item->nsx_ten  }} </td>
                                <td>{{ $item->khuvuc->kv_ten }}</td>
                               
                                <td class="center">
                                    <a class="btn btn-danger" href="qlkho/nhasanxuat/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/nhasanxuat/sua/{{ $item->id }}">
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