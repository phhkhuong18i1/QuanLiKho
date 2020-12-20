@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Vật tư</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <a style="margin-left:38px;" class="btn btn-primary" href="qlkho/vattu/them">Thêm&nbsp;<span class="fa fa-plus"></span></a>
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
                            <th>Tên</th>
                            <th>Giá bán</th>
                            <th>Đơn vị tính</th>
                            <th>Nhóm vật tư</th>
                            <th>Chất lượng</th>
                            <th>Nhà phân phối</th>
                            <th>Nhà sản xuất</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vattu as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->vt_ten }}</td>
                                <td>{{ number_format($item->giatien,0,",",".") }} vnđ</td>
                                <td>{{ $item->donvitinh->dvt_ten }}</td>
                                <td>{{ $item->nhomvattu->nvt_ten }}</td>
                                <td>
                                    @if ($item->chatluong->cl_ten == 'Tốt')
                                        <span class="label label-success">
                                            {{ $item->chatluong->cl_ten }}
                                        </span>
                                    @elseif ($item->chatluong->cl_ten == 'Trung bình')
                                        <span class="label label-warning">
                                            {{ $item->chatluong->cl_ten }}
                                        </span>
                                    @else
                                        <span class="label label-danger">
                                            {{ $item->chatluong->cl_ten }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $item->nhaphanphoi->npp_ten }}</td>
                                <td>{{ $item->nhasanxuat->nsx_ten }}</td>
                                <td class="center">
                                    <a class="btn btn-danger" href="qlkho/vattu/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/vattu/sua/{{ $item->id }}">
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