<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function render(response)
{
  console.log(response);
          var nv_ten,lydo,ma,npp = "";
          var chitiet = response['chitietnk'];
          var ten = chitiet.length;
              nv_ten =  "<td width='120px'><strong>Nhân viên lập phiếu:</strong></td> <td >"+response['nv'].nv_ten+"</td><td><strong></td>";
              lydo = "<td width='120px'><strong>Lý do nhập:</strong></> <td>"+response['nhapkho'].lydo+"</td><td></td>";
              npp = "<td width='120px'><strong>Nhà phân phối:</strong></> <td >"+response['npp'].npp_ten+"</td><td></td>";
              ma =  "<td width='120px'><strong>Mã:</strong></td> <td >"+response['nhapkho'].ma+"</td><td></td>";
                $("#tr1").empty();
                $("#tr1").append(nv_ten);
                $("#tr2").empty();
                $("#tr2").append(lydo);
                $("#tr3").empty();
                $("#tr3").append(npp);
                $("#tr0").empty();
                $("#tr0").append(ma);
                $("#table2").empty();
              for(var i = 0; i<ten; i++)
              { var stt= i+1;
                 var idvt = chitiet[i]['vattu'];
                 var idkho = chitiet[i]['kho']
               var txt = "<tr><td style='border:thin blue solid;border-style:dashed;'>"+stt+"</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['vt_ten']+
                "</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctnk_soluong+"</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['giatien']+
                " VNĐ</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctnk_thanhtien+
                " VNĐ</td><td style='border:thin blue solid;border-style:dashed;'>"+idkho['kho_ten']+
                " </td></tr>";
                 $("#table2").append(txt);   
              }
              
             var tt = "<td width='480px'>Tổng giá trị nhập</td><td width='200px'>"+response['nhapkho'].tongtien+" VND </td>";

             $("#tongtien").empty();
                $("#tongtien").append(tt);  

              var inphieu = "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button><a  class='btn btn-primary' target='_blank' href='qlkho/nhapkho/innhapkho/"+response['nhapkho'].id+"'>In</a>"
                $(".modal-footer").empty();
                $(".modal-footer").append(inphieu);
}

function render1(response)
{
            var nv_ten,lydo,ct,diachi = "";
            var chitiet = response['chitiet'];
            var ten = chitiet.length;

                nv_ten = "<tr><td width='120px'><strong>Nhân viên lập phiếu:</strong></td><td>"+response['xuatkho'].xk_ma+
                "</td><td><strong></td></tr><tr><td width='120px'><strong>Nhân viên lập phiếu:</strong></td><td>"+response['nv'].nv_ten+
                "</td><td><strong></td></tr><tr><td width='120px'><strong>Lý do nhập:</strong></td><td>"+response['xuatkho'].xk_lydo+
                "</td><td><strong></td></tr><tr><td width='120px'><strong>Công trình:</strong></td><td>"+response['ct'].ten+
                "</td><td><strong></td></tr><tr><td width='120px'><strong>Địa chỉ:</strong></td> <td >"+response['ct'].diachi+"</td><td><strong></td></tr>";
               
                $("#table1").empty();
                $("#table1").append(nv_ten);
                $("#table2").empty();
              for(var i = 0; i<ten; i++)
              {   var stt= i+1;
                  var idvt = chitiet[i]['vattu'];
                  var idkho = chitiet[i]['kho']
                  var txt = "<tr><td style='border:thin blue solid;border-style:dashed;'>"+stt+"</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['vt_ten']+
                "</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctxk_soluong+
                "</td><td style='border:thin blue solid;border-style:dashed;'>"+idvt['giatien']+
                " VNĐ</td><td style='border:thin blue solid;border-style:dashed;'>"+chitiet[i].ctxk_thanhtien+
                " VNĐ</td><td style='border:thin blue solid;border-style:dashed;'>"+idkho['kho_ten']+" </td></tr>";
                 $("#table2").append(txt);   
              }
              
             var tt = "<td width='480px'>Tổng giá trị nhập</><td width='200px'>"+response['xuatkho'].xk_tongtien+" VNĐ</td>";

             $("#tongtien").empty();
                $("#tongtien").append(tt);  

                var inphieu = "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button><a  class='btn btn-primary' target='_blank' href='qlkho/xuatkho/in/"+response['xuatkho'].id+"'>In</a>"
                $(".modal-footer").empty();
                $(".modal-footer").append(inphieu);
}



</script>
