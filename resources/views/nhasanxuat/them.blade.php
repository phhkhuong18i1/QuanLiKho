@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/nhasanxuat/danhsach">Nhà sản xuất</a></li>
              <li><i class="fa fa-plus"></i>Thêm</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              </header>
              <div class="panel-body">
              @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong><br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{ session('thongbao') }}</strong>
                        </div>
                    @endif
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/vattu/them">
                  @csrf
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Mã nhà sản xuất <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input class="form-control" name="txtMa"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Tên nhà sản xuất <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input type="number" class="form-control" name="txtTen">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Khu vực <span class="required">*</span></label>
                      <div class="col-lg-10">
                            <select class="form-control" name="sltKhuVuc">
                                @foreach ($khuvuc as $item)
                                    <option value="{{ $item->id }}">{{ $item->kv_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/nhasanxuat/danhsach">Hủy</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    
@endsection
