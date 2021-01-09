@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Form Validation</li>
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
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/nhanvien/them">
                  @csrf
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Tên nhân viên <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="txtTen"  type="text" />
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Số điện thoại <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtSDT"  type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label  class="control-label col-lg-2">Giới tính <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <label>
                         <input type="radio" name="rdoGioiTinh"  value="1">Nam
                        </label>
                        &nbsp;&nbsp;
                        <label>
                         <input type="radio" name="rdoGioiTinh"  value="0" >Nữ
                        </label>                       
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Chứng minh nhân dân <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtCMND"  type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Địa chỉ <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtDiaChi" type="text" />
                      </div>
                    </div>
                   <p  ><center style="font-size:20px; color: red; font-weight:bold;"> Thông tin tài khoản</center></p>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtEmail"  type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">mật khẩu <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtPass"  type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Nhập lại mật khẩu <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="txtPassAgain"  type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label   class="control-label col-lg-2">Phân quyền <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <label class="radio-inline">
                          <input type="radio" name="quyen" value="1" >Quản lí
                        </label>
                       <label class="radio-inline">
                          <input type="radio" name="quyen" value="2" >Thủ kho
                        </label>
                      </div>
                    <div class="form-group" >
                      <div class="col-lg-offset-2 col-lg-10">
                       <center> <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-warning" href="qlkho/nhanvien/danhsach">Hủy</a></center>
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
