@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="qlkho/index">Trang chủ</a></li>
              <li><i class="icon_document_alt"></i><A href="qlkho/xuatkho/danhsach">Xuất kho</a></li>
              <li><i class="fa fa-files-o"></i>Xuất</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->

        <div class="row">
        <div style="margin-left:20px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Thông tin phiếu xuất</b></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span13">
                            <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="acct-password-row" class="span8" style="margin-left:100px">
                                    <fieldset>
                                        <div class="col-lg-3">
                                            <label>Tên CT:</label>
                                            <select  class="form-control" name="selCT" id="selCT">
                                                <option>--Chọn--</option>
                                                @foreach($data as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->ten }}</option>
                                                   
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <div class="col-lg-3">
                                            <label>Lý do:</label>
                                            <input  type="text" name="txtLyDo" class="form-control">
                                        </div>
                                       
                                        <div  class="col-lg-3">
                                            <label>Nhân viên:&nbsp</label>
                                            <?php 
                                                $nv = DB::table('nhanvien')->where('id',Auth::user()->id)->first();

                                            ?>
                                            <input type="text" value="{{ $nv->nv_ten}}" class="form-control">
                                            <input type="hidden" name="txtNV" value="{{ $nv->id }}">
                                        </div>
                                        
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4" style="margin-left:100px">
                                    <fieldset>
                                   
                                        <div class="col-lg-3">
                                            <label>Mã phiếu:&nbsp</label>
                                            <input type="text" name="txtID" value="PXK{!! date('dmYhms') !!}" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Ngày xuất:</label>
                                            <input type="text" name="" value="{!! date('d-m-Y') !!}" class="form-control">
                                        </div>
                                        <button type="submit"  style="margin-left: 15px; margin-top: 24px" class=" btn btn-success"><i class="icon-save"></i>&nbsp&nbspLưu</button>
                                        <a  style="margin-left: 15px; margin-top: 24px" class="btn btn-warning" href="qlkho/xuatkho/danhsach">Hủy</a>
                                    </fieldset>
                                    
                                </div>
                                </form>
                                <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div id="acct-password-row" class="span12">
                                    <div>
                                        <u><p><b>Danh sách vật tư</b></p></u>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tên:</label>
                                        <select name="vattu_id" id="vattu_id" class="selVT form-control">
                                            <option>--Chọn--</option>
                                            @foreach($data1 as $item)
                                            <option value="{{ $item->id}}">{{ $item->vt_ten}}</option>
                    
                                            @endforeach
                                        </select>
                                    </div>  
                                    <div class="col-lg-2">
                                        <label>ĐVT:</label>
                                            <select class="form-control" name="dvt" id="country1">
                                                <option value="" ></option>
                                            </select>
</div>
                                            <div class="col-lg-3">
                                        <label>Kho:</label>
                                            <select class="ware form-control" name="kho" id="country2">
                                                <option value="" ></option>
                                            </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Số lượng:</label>
                                        <input type="number" name="sluong" id="sluong" onkeypress="return isNumberKey(event)" min="0" class="sluong form-control">&nbsp&nbsp
                                       
                                    </div>
                                    <div id='add'>
                                    <a style="margin-left: 15px; margin-top: 24px" class=" btn btn-primary" onclick="addCart()" ><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                </form>
                                <div id="acct-password-row" class="span12">
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
                                                    <th>Xóa</th>
                                                    <th>Cập nhật</th>
                                                    <th class="span1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @foreach($content as $item)
                                                
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->options->kho }}</td>
                                                    <td>{{ $item->options->size }}</td>
                                                    <td> <input id="quanty-item-{{$item->rowId}}" style="width:70px ;" type="number" min="0" onkeypress="return isNumberKey(event)" value="{{$item->qty}}"  /></td>
                                                    <td>{{ number_format($item->price,0,",",".") }} vnđ</td>
                                                    <td>{{ number_format($item->qty*$item->price,0,",",".") }}vnđ</td>
                                                    <td><i class="fa fa-times" onclick="DeleteListItemCart('{{$item->rowId}}')"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart('{{$item->rowId}}',{{$item->weight}})"></i></td>
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

        </section>
    </section>
@endsection
@section('script')
       @include('layout.script')
    <script>
        // $(document).ready(function() {
        //   $(document).on('click','.add',function(e) {
        //       // var id = $(this).attr('.selVT1');
        //       e.preventDefault();
        //       // var id = $(this).attr('sluong');
        //       // alert(id);
        //         var id = $(this).parent().parent().find(".selVT").val();
        //         var qty = $(this).parent().parent().find(".sluong").val();
        //         var idKho = $(this).parent().parent().find(".ware").val();
        //         var token = $("input[name='_token']").val();
        //         // alert(idKho);
        //         $.ajax({
        //             url:'qlkho/xuatkho/xuathang/'+id+'/'+qty,
        //             type:'GET',
        //             cache:false,
        //             data:{"_token":token,"id":id,"qty":qty,"idKho":idKho},
        //             success: function(data) {
        //                 if(data == "oke") {
        //                   window.location = "qlkho/xuatkho/xuat";
        //                 }
        //                 else{
        //                     alertify.error('quá số lượng tồn');
        //                 }
                        
        //             }
        //         });
        //     });
        // });

        function addCart(soluong)
        {
            
                
                var id = $(".selVT").val();
                console.log(id);
                var qty = $(".sluong").val();
                var idKho = $(".ware").val();
                var token = $("input[name='_token']").val();
                // alert(idKho);
                $.ajax({
                    url:'qlkho/xuatkho/xuathang/'+id+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"id":id,"qty":qty,"idKho":idKho},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "qlkho/xuatkho/xuat";
                        }
                        else{
                            alertify.error('quá số lượng tồn, số lượng còn lại là '+soluong);
                        }
                        
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

     function SaveListItemCart(id,SoLuongTon)
    {
        
        var soluong = $("#quanty-item-"+id).val();
        
        $.ajax({
			url: 'qlkho/xuatkho/SaveCart-list/'+id+'/'+soluong,
			type: 'GET', 
		}).done(function(response)
			{
                console.log(SoLuongTon);
                if(Number(soluong)> Number(SoLuongTon))
                {
                    alertify.error('quá số lượng tồn, Số lượng tồn còn lại là '+SoLuongTon);
                }
                else{
                RenderCart(response);
				alertify.success('update thành công');
                }
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
            console.log(e);
            var vattu_id = e.target.value;

            //ajax

            $.getJSON("qlkho/xuatkho/vattu/ajax-call?vattu_id="+vattu_id, function (data) {

                console.log(data);

                $('#country').empty();
                $.each(data, function(index, countryObj){

                     $('#country').append('<option value="'+countryObj.id+'  selected="{{ old("ten") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.vt_ten+'</option>');
                });

                $('#country1').empty();
                $.each(data, function(index, countryObj){

                    $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                });

                $('#country2').empty();
                $.each(data, function(index, countryObj){

                    $('#country2').append('<option value="'+countryObj.id+'">'+countryObj.kho_ten+'</option>');
                });

                
                $.each(data, function(index, countryObj){
                    $('#add').empty();
                $('#add').append('<a style="margin-left: 15px; margin-top: 24px" class=" btn btn-primary" onclick=addCart("'+countryObj.soluong_ton+'")><i class="fa fa-plus"></i></a>');
});


            });

        });

        
    </script>
    @endsection