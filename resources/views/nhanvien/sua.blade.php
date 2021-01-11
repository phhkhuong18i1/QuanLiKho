@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="fa fa-user"></i><a href="qlkho/nhanvien/danhsach">Nhân viên</a></li>
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
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/nhanvien/sua/{{ $nhanvien->id }}">
                  @csrf
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Tên nhân viên <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="txtTen" value="{{ $nhanvien->nv_ten }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtEmail" value="{{ $nhanvien->email }}" type="text" disabled="true"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Số điện thoại <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtSDT" value="{{ $nhanvien->nv_sdt }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Giới tính <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <label>
                         <input type="radio" name="GioiTinh"  value="1" @if($nhanvien->GioiTinh == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Nam
                        </label>
                        &nbsp;&nbsp;
                        <label>
                         <input type="radio" name="GIOITINH"  value="0" @if($nhanvien->GioiTinh == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Nữ
                        </label>                       
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Chứng minh nhân dân <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtCMND" value="{{ $nhanvien->CMND }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Địa chỉ <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtDiaChi" value="{{ $nhanvien->nv_diachi }}" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Phân quyền <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <label class="radio-inline">
                      <input name="quyen" value="1" 
                                    @if($user->role == 1)
                                    {{"checked"}}
                                    @endif 
                                     type="radio">Quản lí
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" 
                                    value="2" 
                                     @if($user->role == 2)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Thủ kho
                                </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/nhanvien/danhsach">Hủy</a>
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
