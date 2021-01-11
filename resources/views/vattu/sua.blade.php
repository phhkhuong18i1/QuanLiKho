@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/vattu/danhsach">Vật tư</a></li>
              <li><i class="fa fa-pencil"></i>Sửa</li>
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
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/vattu/sua/{{ $vattu->id }}">
                  @csrf
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Tên <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="txtTen" value="{{ $vattu->vt_ten }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Giá nhập <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input onkeypress="return isNumberKey(event)" class=" form-control" id="address" name="txtGiaNhap" value="{{ $vattu->gianhap }}" type="number" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Giá bán <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input onkeypress="return isNumberKey(event)" class=" form-control" id="address" name="txtGiaTien" value="{{ $vattu->giatien }}" type="number" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Đơn vị tính <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltDonViTinh">
                                @foreach ($dvt as $item)
                                    <option
                                        @if ($vattu->donvitinh_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->dvt_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Nhóm vật tư <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltNhomVatTu">
                                @foreach ($nvt as $item)
                                    <option
                                        @if ($vattu->nhomvattu_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->nvt_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Chất lượng <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltChatLuong">
                                @foreach ($cl as $item)
                                    <option
                                        @if ($vattu->chatluong_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->cl_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Nhà phân phối <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltNhaPhanPhoi">
                                @foreach ($npp as $item)
                                    <option
                                        @if ($vattu->nhaphanphoi_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->npp_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Nhà sản xuất <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="sltNhaSanXuat">
                                @foreach ($nsx as $item)
                                    <option
                                        @if ($vattu->nhasanxuat_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->nsx_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Kho <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select name="sltKho" class="form-control">
                      @foreach ($kho as $item)
                                    <option
                                        @if ($khovt->kho_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">
                                        {{ $item->kho_ten }}
                                    </option>
                                @endforeach
                            </select>
                      </div>
                     
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">số lượng <span class="required">*</span></label>
                      <div class="col-lg-2">
                      <input onkeypress="return isNumberKey(event)" class="form-control" id="l" name="txtSLuong" class="span4" type="number" value="{!! $khovt->soluong_nhap !!}" autocomplete="false">
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
   
@endsection
@section('script')
@include('layout.script')
@endsection