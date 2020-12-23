@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Khu vực</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <div class="text-right">
              <a  class="btn btn-primary" href="qlkho/khuvuc/them">Thêm&nbsp;<span class="fa fa-plus"></span></a>
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
                            <th>Mã khu vực</th>
                            <th>Tên khu vực</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khuvuc as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->kv_ma }}</td>
                                <td>{{ $item->kv_ten }} </td>
                                
                                <td class="center">
                                    <a class="btn btn-danger" href="qlkho/khuvuc/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/khuvuc/sua/{{ $item->id }}">
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