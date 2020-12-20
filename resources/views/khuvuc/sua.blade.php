@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/khuvuc/danhsach">Khu vực</a></li>
              <li><i class="fa fa-files-o"></i>Sửa</li>
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
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/khuvuc/sua/{{ $khuvuc->id }}">
                  @csrf
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Mã <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="txtMa" value="{{ $khuvuc->kv_ma }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Tên <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtTen" value="{{ $khuvuc->kv_ten }}" type="text" />
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/khuvuc/danhsach">Hủy</a>
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
   
@endsection
