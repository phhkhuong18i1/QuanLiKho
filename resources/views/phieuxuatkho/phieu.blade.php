<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách phiếu xuất kho</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif, font-size: 10px;
        }
    </style>
    <base href="{{ asset('') }}">
</head>
<body>
    <strong>KHO VẬT LIỆU XÂY DỰNG VIỆT KHOA</strong>
    <hr>
    <center><h2>DANH SÁCH PHIẾU XUẤT KHO</h2></center>
    <br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>
                <td style="border:thin solid;"><strong>STT</strong></td>
                <td style="border:thin solid;"><strong>Mã</strong></td>
                <td style="border:thin solid;"><strong>Ngày lập</strong></td>
                <td style="border:thin solid;"><strong>Lý do</strong></td>
                <td style="border:thin solid;"><strong>Tổng tiền</strong></td>
                <td style="border:thin solid;"><strong>công trình</strong></td>
                <td style="border:thin solid;"><strong>Địa chỉ</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
                @foreach ($xuatkho as $value)
                    <tr>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $count = $count + 1 }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->xk_ma }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">
                            {{ Carbon\Carbon::parse($value->xk_ngaylap)->format('d-m-Y') }}
                        </td>
                        <td style="border:thin blue solid;border-style:dashed;" >{{ $value->xk_lydo }}</td>
                        <td style="border:thin blue solid;border-style:dashed;" >
                            {{ $value->xk_tongtien }}
                        </td>
                       
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->congtrinh->ten }}</td>
                        <td style="border:thin blue solid;border-style:dashed;">{{ $value->congtrinh->diachi }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    <table style="margin-bottom:-300px;">
        <tr>
            <td>TP. Hồ Chí Minh, Ngày lập danh sách: <?php echo date("d-m-Y") ?></td>
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
