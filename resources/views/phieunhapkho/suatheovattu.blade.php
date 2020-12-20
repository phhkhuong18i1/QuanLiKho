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
        <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Nhập kho thông thường</b></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span13">
                            <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="acct-password-row" class="span8">
                                    <fieldset>
                                        <div class="col-lg-3 ">
                                            <label>Tên NPP:&nbsp&nbsp</label>
                                            <select  class="form-control" name="state_id" id="state_id" disabled>
                                            @foreach($nhaphanphoi as $npp)
                                             <option 
                                               @if($nhapkho->nhaphanphoi->id == $npp->id)
                                              {{"selected"}}
                                                @endif

                                               value="{{$npp->id}}">{{$npp->npp_ten}}</option>
                                             @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <input type="text" name="txtLyDo" value="{{ $nhapkho->lydo }}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Nhân viên:</label>
                                            <?php $user = DB::table('users')->where('id',$nhapkho->nv_id)->first(); ?>
                                            <input type="text" value="{{ $user->name }}" class="form-control" disabled="true">
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4">
                                    <fieldset>
                                        <div class="col-lg-3 ">
                                            <label>Mã phiếu:</label>
                                            <input type="text" name="txtID" value="{!! $nhapkho->ma !!}" class="form-control" disabled="true">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Ngày lập:&nbsp</label>
                                            <input type="date" name="txtDate" value="{!! $nhapkho->ngaylap !!}" class="form-control" disable>
                                        </div>
                                        <div>
                                            <button  style="margin-left: 15px; margin-top: 24px" type="submit" class="btn btn-success"><i class="icon-save"></i>cập nhật</button>
                                        </div>
                                    </fieldset>
                                </div>
                                </form>
                                <br>
                                <br>
                                <div id="acct-password-row" class="span12">
                                    <div>
                                    <form action="" method="POST" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                            <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>ĐVT</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($chitiet as $val)
                                                <tr>
                                                <?php 
                                                    $vt = DB::table('vattu')->where('id',$val->vt_id)->first(); 
                                                    $dvt = DB::table('donvitinh')->where('id',$vt->donvitinh_id)->first();
                                                ?>
                                                        <td>{!! $val->vt_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td>
                                                            <input type="number" value="{!! $val->ctnk_soluong !!}" class="qty">
                                                            <input type="hidden" name="" value="{{ $val->vt_id }}" class="vtID">
                                                            <input type="hidden" name="" value="{{ $nhapkho->id }}" class="nkID">
                                                        </td>
                                                        <td>{!!  number_format($vt->giatien) !!}vnd</td>
                                                        <td>{!! number_format($val->ctnk_thanhtien)  !!} vnd</td>
                                                        <td>
                                                            <a href="{!! URL::route('chucnang.nhapkho.getDeletePro',[$val->vt_id,$nhapkho->id]) !!}">xóa</a>
                                                            <a href="#" class="del" >cập nhật</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                    <td colspan="5" align="right"><b><i>Tổng tiền</i></b></td>
                                                    <td>{!! number_format($nhapkho->tongtien)  !!} vnđ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".del").click(function(){
                var nkID = $(this).parent().parent().find(".nkID").val();
                var vtID = $(this).parent().parent().find(".vtID").val();
                var qty = $(this).parent().parent().find(".qty").val();
                var token = $("input[name='_token']").val();
                // alert(xkID);
                $.ajax({
                    url:'http://localhost/quanlykho/qlkho/nhapkho/suavattu/'+vtID+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"nkID":nkID,"qty":qty,"vtID":vtID},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "http://localhost/quanlykho/qlkho/nhapkho/sua-theo-vat-tu/"+nkID;
                        }
                        else {
                         alert("Error!");
                        }
                    }
                });
            });
        });
    </script>
@endsection
