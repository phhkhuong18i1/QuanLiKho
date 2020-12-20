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
                Advanced Form validations
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
                    @if (session('loi'))
                        <div class="alert alert-danger">
                            <strong>{{ session('loi') }}</strong>
                        </div>
                    @endif
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="qlkho/vattu/nhap">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Vật tư <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select name="sltVatTu" class="form-control">
                                <option value="" disabled selected>---------- Chọn vật tư ----------</option>
                                @foreach ($vattu as $item)
                                    @if ($item->chatluong->ten == 'Tốt' || $item->chatluong->ten == 'Trung bình')
                                        <option value="{{ $item->id }}">{{ $item->vt_ten }}</option>
                                    @endif
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
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Nhập</button>
          
                      </div>
                      </div>
                </form>
              </div>
            </section>
         
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

     
        <!-- page end-->
      </section>
    </section>
@endsection
