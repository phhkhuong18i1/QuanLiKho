@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-table"></i>Liên hệ</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <div class="text-right">
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
                            <th>id</th>
                            <th>Ngày gửi</th>
                            <th>Tên</th>
                            <th>email</th>
                            <th>Chủ đề</th>
                            <th>Nội dung</th>
                            <th>Xóa</th>
                            <th>Phản hồi</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lienhe as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->date }} </td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->subject }} </td>
                                <td>{{ $item->message }} </td>
                                <td class="center">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa dữ liệu này?')" class="btn btn-danger" href="qlkho/lienhe/xoa/{{ $item->id }}">
                                        <i class="fa fa-trash-o fa-fw"></i>Xóa
                                    </a>
                                </td>
                                <td class="center">
                                    <a  class="btn btn-primary" href="qlkho/phanhoi/{{ $item->id }}">
                                        <i class="fa fa-mail-forward"></i> Phản hồi
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