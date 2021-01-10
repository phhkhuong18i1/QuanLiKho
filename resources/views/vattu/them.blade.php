@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/vattu/danhsach">Vật tư</a></li>
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
                      <label  class="control-label col-lg-2">Tên vật tư <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input class="form-control" name="txtTen"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Giá nhập / 1 đơn vị <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input type="number" min="0" class="form-control" name="txtGiaNhap" onkeypress="return isNumberKey(event)">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Giá bán / 1 đơn vị <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input type="number" min="0" class="form-control" name="txtGiaTien" onkeypress="return isNumberKey(event)">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Đơn vị tính <span class="required">*</span></label>
                      <div class="col-lg-10">
                            <select class="form-control" name="sltDonViTinh">
                                @foreach ($dvt as $item)
                                    <option value="{{ $item->id }}">{{ $item->dvt_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="control-label col-lg-2">Nhóm vật tư <span class="required">*</span></label>
                      <div class="col-lg-10">
                             <select class="form-control" name="sltNhomVatTu">
                                @foreach ($nvt as $item)
                                    <option value="{{ $item->id }}">{{ $item->nvt_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Chất lượng <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltChatLuong">
                                @foreach ($cl as $item)
                                    <option value="{{ $item->id }}">{{ $item->cl_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Nhà phân phối <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltNhaPhanPhoi">
                                @foreach ($npp as $item)
                                    <option value="{{ $item->id }}">{{ $item->npp_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2 col-sm-3">Nhà sản xuất <span class="required">*</span></label>
                      <div class="col-lg-10 col-sm-9">
                      <select class="form-control" name="sltNhaSanXuat">
                                @foreach ($nsx as $item)
                                    <option value="{{ $item->id }}">{{ $item->nsx_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Kho <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select name="sltKho" class="form-control">
                                <option value="" disabled selected>---------- Chọn kho ----------</option>
                                @foreach ($kho as $item)
                                    <option value="{{ $item->id }}">{{ $item->kho_ten }}</option>
                                @endforeach
                            </select>
                      </div>
                     
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">số lượng <span class="required">*</span></label>
                      <div class="col-lg-2">
                      <input id="l" name="txtSLuong" min="0" class="form-control" type="number" value="{!! old('txtSLuong') !!}" autocomplete="false" onkeypress="return isNumberKey(event)">
                      </div>
                     
              </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/vattu/danhsach">Hủy</a>
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
    </section>
@endsection
@section('script')
@include('layout.script')
@endsection