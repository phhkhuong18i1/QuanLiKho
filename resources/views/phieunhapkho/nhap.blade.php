@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><a href="qlkho/nhapkho/danhsach">Nhập kho</a></li>
              <li><i class="fa fa-plus"></i>Nhập</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->

        <div class="row">
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
    <div style="margin-left:20px" class="span13">
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
                                <div id="acct-password-row" class="span8" style="margin-left:100px" >
                                    <fieldset>
                                    <div class="col-lg-3">
                                            <label>Tên nhà phân phối:</label>
                                            <select  class="form-control" name="state_id" id="state_id">
                                                <option>--Chọn--</option>
                                                @foreach($data as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->npp_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Lý do:</label>
                                            <input  type="text" name="txtLyDo" id="lydo" value="{{ old('txtLyDo') }}" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Nhân viên:</label>
                                            <?php 
                                                $nv = DB::table('nhanvien')->where('id',Auth::user()->id)->first();

                                            ?>
                                            <input type="text" value="{{ $nv->nv_ten}}" class="form-control">
                                            <input type="hidden" name="txtNV" id="id_nv" value="{{ $nv->id }}">
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4" style="margin-left:100px">
                                    <fieldset>
                                        <div class="col-lg-3 ">
                                            <label>Mã phiếu:</label>
                                            <input  type="text" name="txtID" id="ma" value="PNK{!! date('dmYhms') !!}" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Ngày lập:</label>
                                            <input  type="text" name="txtDate" id="date" value="{!! date('d-m-Y') !!}" class="form-control">
                                        </div>
                                        <div>
                                        <button type="submit"  style="margin-left: 15px; margin-top: 24px" class=" btn btn-success" ><i class="icon-save"></i>&nbsp&nbspLưu</button>
                                            <a  style="margin-left: 15px; margin-top: 24px"   class="btn btn-warning" href="qlkho/nhapkho/danhsach" >Hủy</a>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span12"> 
                                    <fieldset>
                                        <div> 
                                            <u><p><b>Danh sách vật tư</b></p></u>
                                        </div>
                                    </fieldset>                    
                                </div>
                                </form>
                                <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div id="acct-password-row" class="span13">
                                        <fieldset>
                                            <div class="col-lg-3">
                                                <label>Tên:</label>
                                                    <select  class="selVT1 form-control" name="vattu_id" id="vattu_id">
                                                        <option>--Chọn--</option>
                                                        @foreach($data1 as $item)
                                                        <option value="{{ $item->id}}">{{ $item->vt_ten}}</option>
                                                        @endforeach
                                                    </select>                                                
                                                    </div>
                                             <div class="col-lg-2">
                                                <label>ĐVT:</label>
                                                    <select class="form-control" name="dvt" id="country1">
                                                        <option   value=""></option>
                                                    </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label>Kho:</label>
                                                    <select class="selKho form-control" name="selKho" id="selKho">
                                                        <option>--Chọn--</option>
                                                        @foreach($dataKho as $item)
                                                        <option value="{{ $item->id}}">{{ $item->kho_ten}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label>Số lượng:</label>
                                                    <input type="number" name="sluong" id="sluong" class="sluong form-control" min="0" onkeypress="return isNumberKey(event)">
                                            </div>
                                                <a  style="margin-left: 15px; margin-top: 24px"  class=" btn btn-primary" onclick="addCart()" ><i class="fa fa-plus"></i></a>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <br>
                                    <br>
                                    
                                </form>
                                <div class="span12">
                                    <div>
                                    <form action="" method="POST" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                            <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>Kho</th>
                                                    <th>ĐVT</th>
                                                   
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                    <th > Xóa</th>
                                                    <th > Cập nhật</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($content as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->options->kho }}</td>
                                                    <td>{{ $item->weight }}</td>
                                                    <td> <input id="quanty-item-{{$item->rowId}}" min="0" class="form-control" onkeypress="return isNumberKey(event)"  required type="number" value="{{$item->qty}}" min="0" max="100" /></td>
                                                    <td>{{ number_format($item->price) }} vnđ</td>
                                                    <td>{{ number_format($item->qty*$item->price) }} vnđ</td>
                                                    <td><i class="fa fa-times" onclick="DeleteListItemCart('{{$item->rowId}}')"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart('{{$item->rowId}}')"></i></td>
                                                </tr>
                                                @endforeach
                                            
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

 
  
        <!-- page end-->
      </section>
    </section>
@endsection
@section('script')

<script> 

       function addCart()
       {
             
                var idKho = $(".selKho").val();
                var id = $(".selVT1").val();
                var qty = $(".sluong").val();
                var token = $("input[name='_token']").val();
                 //alert(id);
                 // alert(token);
                $.ajax({
                    url:'qlkho/nhapkho/nhaphang/'+id+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"id":id,"qty":qty,"idKho":idKho},
                    success: function(data) {
                        RenderCart(data);
                    }
                });
            
        }

     
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

     function SaveListItemCart(id)
    {
        
        var soluong = $("#quanty-item-"+id).val();
        
        $.ajax({
			url: 'qlkho/nhapkho/SaveCart-list/'+id+'/'+soluong,
			type: 'GET', 
		}).done(function(response)
			{
                
                RenderCart(response);
				alertify.success('update thành công');
                
			});
     
    }

     function RenderCart(response){
            $("#myTable").empty();
            $("#myTable").html(response);
            //  $("#total-quanty-show").text($("#total-quanty-cart").val());
        }
           
        
           
       
    </script>


    <!-- Ajax Vật tư -->
    <script>
        $('#vattu_id').on('change', function(e) {
            var vattu_id = e.target.value;

            //ajax

            $.getJSON("qlkho/nhapkho/vattu/ajax-call?vattu_id="+vattu_id, function (data) {


                $('#country1').empty();
                $.each(data, function(index, countryObj){

                    $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                });

            });
        });
    </script>
        <!-- Basic Forms & Horizontal Forms-->
@include('layout.script')
@endsection
