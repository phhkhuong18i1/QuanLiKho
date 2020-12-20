@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/nhapkho/danhsach">Nhập kho</a></li>
              <li><i class="fa fa-pencil"></i>Sửa</li>
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
                                            <select  class="form-control" name="state_id" id="state_id">
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
                                            <input type="text" name="txtLyDo" value="{{ $nhapkho->lydo }}" class="form-control">
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
                                            <input type="date" name="txtDate" value="{!! $nhapkho->ngaylap !!}" class="form-control">
                                        </div>
                                        <div>
                                            <button  style="margin-left: 15px; margin-top: 24px" type="submit" class="btn btn-success"><i class="icon-save"></i>cập nhật</button>
                                            <a  style="margin-left: 15px; margin-top: 24px" class="btn btn-warning" href="qlkho/nhapkho/danhsach">Hủy</a>
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
                                                    <th class="span1"></th>
                                                    <th class="span1"></th>
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
                                                        <input id="quanty-item-{{$vt->id}}"  required type="number" value="{{$val->ctnk_soluong}}" min="0" max="100" />
                                                        <input type="hidden" name="" value="{{ $nhapkho->id }}" class="nkID">
                                                            </td>
                                                        <td>{!!  number_format($vt->giatien) !!}vnd</td>
                                                        <td>{!! number_format($val->ctnk_thanhtien)  !!} vnd</td>
                                                        <td><i class="fa fa-times" onclick="DeleteListItemCart({{$val->vt_id }})"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart1({{$val->vt_id }})"></i></td>
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
        function DeleteListItemCart(id)
     {
        //  console.log(id);
       
        $.ajax({
			url: 'qlkho/nhapkho/xoaCart/'+id,
			type: 'GET', 
		}).done(function(response)
 
			{
                RenderCart(response);
				alertify.success('xóa thành công');
			});
        
     }

     function SaveListItemCart1(id)
    {
        
                var nkID = $(".nkID").val();
                var soluong = $("#quanty-item-"+id).val();
                var token = $("input[name='_token']").val();
        console.log(nkID);
        $.ajax({
			url: 'qlkho/nhapkho/SaveCart-list1/'+id+'/'+soluong,
			type: 'GET', 
            data:{"_token":token,"nkID":nkID},
		}).done(function(response)
			{
                
                RenderCart(response);
				alertify.success('update thành công');
                
			});
    
    }

     function RenderCart(response){
            $("#myTable").empty();
            $("#myTable").html(response);
     }
    </script>
    
@endsection
