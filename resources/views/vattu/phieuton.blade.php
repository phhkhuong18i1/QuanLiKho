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
            font-family: DejaVu Sans, sans-serif, font-size: 10px;
        }
    </style>
    <base href="{{ asset('') }}">
</head>
<body>
    <hr>
    <center><h1>CÔNG TY TNHH MTV KHUONG PHAN</h1></center>
    <center><h2>DANH SÁCH VẬT TƯ TỒN KHO</h2></center>
    <br>
    <table cellpadding="3px" style="border:thin solid;" >
        <thead>
            <tr>
                <td style="border:thin solid;" width="20px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
                <td style="border:thin solid;" width="150px"><strong>Kho</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Số lượng tồn</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn vị tính</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
                @foreach ($vattukho as $value)
                    <tr>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $count = $count + 1 }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->vattu->vt_ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->kho->kho_ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->soluong_ton }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->vattu->donvitinh->dvt_ten }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    <table style="margin-bottom:-300px;">
        <tr align="right">
            <td >Đà Nẵng, Ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td width="250px" class="writer-title"><strong>Thủ kho</strong></td>
        </tr>
        <tr>
            <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
        </tr>
    </table>
</body>
</html>
