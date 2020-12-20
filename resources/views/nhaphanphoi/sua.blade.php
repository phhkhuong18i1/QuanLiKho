@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/nhaphanphoi/danhsach">Nhà phân phối</a></li>
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
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/nhaphanphoi/sua/{{ $npp->id }}">
                  @csrf
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Tên nhà phân phối <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="txtTen" value="{{ $npp->npp_ten }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Địa chỉ <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtDiaChi" value="{{ $npp->diachi }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Số điện thoại <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input class=" form-control" id="address" name="txtSDT" value="{{ $npp->sodienthoai }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input class=" form-control" id="address" name="txtEmail" value="{{ $npp->email }}" type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Khu vực <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltKhuVuc">
                                @foreach ($khuvuc as $item)
                                    <option
                                        @if ($npp->khuvuc_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->kv_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/nhaphanphoi/danhsach">Hủy</a>
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
