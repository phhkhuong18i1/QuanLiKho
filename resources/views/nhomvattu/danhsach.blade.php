@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Nhóm vật tư</li>
           
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <a style="margin-left:38px;" class="btn btn-primary" href="qlkho/nhomvattu/them">Thêm&nbsp;<span class="fa fa-plus"></span></a>
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
                            <th>id</th>
                            <th>Tên</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nhomvattu as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->nvt_ma }}</td>
                                <td>{{ $item->nvt_ten }} </td>
                                
                                <td class="center">
                                    <a class="btn btn-danger" href="qlkho/nhomvattu/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-primary" href="qlkho/nhomvattu/sua/{{ $item->id }}">
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