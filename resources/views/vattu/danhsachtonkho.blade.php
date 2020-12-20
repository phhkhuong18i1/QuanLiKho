@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Vật tư</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>Basic Table</li>
            </ol>
            <div class="text-right">
                            <a href="qlkho/vattu/inton" class="btn btn-warning">
                                <i class="fa fa-file-pdf-o fa-fw"></i>Xuất file PDF
                            </a>
                        </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Advanced Table
              </header>

              <table class="display table table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center">
                            <th>Tên vật tư</th>
                            <th>Kho</th>
                            <th>Số lượng tồn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vattukho as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->vattu->vt_ten }}</td>
                                <td>{{ $item->kho->kho_ten }}</td>
                                <td>{{ $item->soluong_ton }}</td>
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