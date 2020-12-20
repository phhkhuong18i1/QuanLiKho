<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icons/export.png" />
    <title>Danh sách phiếu nhập kho</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif, font-size: 10px;
        }
    </style>
    <base href="{{ asset('') }}">
</head>
<body>
    <hr>
    <center><h1>CÔNG TY TNHH MTV KHUONG PHAN</h1></center>
    <center><h2>DANH SÁCH PHIẾU NHẬP KHO</h2></center>
    <br>
    <table  cellpadding="3px" style="border:thin solid; margin-right:5px" >
        <thead>
            <tr>
                <td style="border:thin solid;" width="20px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Mã phiếu</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Ngày lập</strong></td>
                <td style="border:thin solid;" width="150px"><strong>lý do</strong></td>
                <td style="border:thin solid;" width="50px"><strong>Nhân viên</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Tổng tiền</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
                @foreach ($nhapkho as $value)
                    <tr>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $count = $count + 1 }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->ma }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->ngaylap }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->lydo }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->nhanvien->nv_ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ number_format($value->tongtien)  }} vnđ</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
<br>
    <table style="margin-bottom:-300px;">
        <tr align="center">
            <td >Đà Nẵng, Ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> </td>
            <td>       </td>
            <td width="250px" ><strong>Thủ kho</strong></td>
        </tr>
        <tr align="center">
            <td>
                <hr>
            </td>
            <td> </td>
            <td style="margin-right: -500px;" ><span>(Ký và ghi rõ họ tên)</span></td>
        </tr>
       
    </table>
</body>
</html>
