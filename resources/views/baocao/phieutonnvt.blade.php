<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icons/export.png" />
    <title>Danh sách vật tư tồn kho</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif, font-size: 7px;
        }
    </style>
    <base href="{{ asset('') }}">
</head>
<body>
    <hr>
    <center><h2>CÔNG TY TNHH MTV KHUONG PHAN</h2></center>
    <center><h2>DANH SÁCH VẬT TƯ TỒN KHO</h2></center>
    <center><h3> Nhóm vật tư:{{$nhomvt->nvt_ten}}</h3> </center>
    
    <table cellpadding="3px" style="border:thin solid;" >
        <thead>
            <tr>
                <td style="border:thin solid;" width="20px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Số lượng tồn</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn giá</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn vị tính</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Thành tiền</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
                @foreach ($vattu as $value)
                    <tr>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $count = $count + 1 }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->vt_ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->ton }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->giatien }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->dvt_ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ number_format($value->giatien*$value->ton) }}</td>
                      
                    </tr>
                @endforeach
                <tr><td colspan="6" align="right">Tổng tiền: {!! number_format($tong[0]->thanhtien)  !!} vnđ</td></tr>
        </tbody>
    </table>

    <table style="margin-bottom:-300px;">
        <tr align="right">
            <td >Đà Nẵng, Ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> </td>
            <td align="right" width="250px" class="writer-title"><strong>Thủ kho</strong></td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
            <td align="right" width="270px" class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
        </tr>
     
    </table>
</body>
</html>
