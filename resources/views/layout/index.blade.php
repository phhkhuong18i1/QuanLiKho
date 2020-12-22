<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Elements | Creative - Bootstrap 3 Responsive Admin Template</title>

  
  <!-- Bootstrap CSS -->
  <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
  <!-- bootstrap theme -->
  <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet" />
 <!-- DataTables CSS -->
 <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- DataTables Responsive CSS -->
<link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
   @include ('layout.header')
    <!--header end-->

    <!--sidebar start-->
   @include('layout.menu') 
    <!--sidebar end-->

    <!--main content start-->
   @yield('content')
    <!--main content end-->
  </section>
  <!-- container section end -->

  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  <!-- javascripts -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- gritter -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <!-- datepicker -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- custom gritter script for this page only-->
  <script src="{{ asset('js/gritter.js') }}" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="assets/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  <script>

$(document).ready(function(){
  chart30days();
  var chart =   new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4AD03'],

  hideHover: 'auto',
  parseTime: 'false',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  // The name of the data record attribute that contains x-values.
  xkey: 'preiod',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['order','profit','quantify'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['đơn hàng','doanh số','số lượng']
});

function chart30days()
{
  var _token = $('input[name="_token"]').val();

  $.ajax({
    url: "qlkho/thongke/chart30days",
    type: "POST",
    dataType: "JSON",
    data: {_token:_token},
    success:function(data)
    {
      chart.setData(data);
    }

  })
}

$('.dasboard-filter').change(function()
{
  var dasboard_value = $(this).val();
  var _token = $('input[name="_token"]').val();
  //alert(dasboard_value);

  $.ajax({
    url: "qlkho/thongke/dasboard-filter",
    type: "POST",
    dataType: "JSON",
    data: {dasboard_value:dasboard_value, _token:_token},
    success:function(data)
    {
      chart.setData(data);
    }
  });
});

$("#btn-dasboard-filter").click(function(){
     //alert("ok");

     var _token = $('input[name="_token"]').val();
     var from_date = $('#datepicker').val();
     var to_date = $('#datepicker2').val();

     $.ajax({
       url: "qlkho/thongke/filter-by-day",
       type: "POST",
       dataType: "JSON",
       data: {from_date: from_date, to_date: to_date, _token:_token},

       success:function(data)
       {
          chart.setData(data);
       }
     });
   }
   );
   });

    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            ordering: false,
            scrollX: true,
            scrollY: 300
        });
    });

    $(document).ready(function() {
        $('#dataTable-example').DataTable({
            responsive: true,
            ordering: false,
            scrollX: true,
            scrollY: 300
        });
    });

   
    </script>

   <script type="text/javascript">
 $( function() {
    $( "#datepicker" ).datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );

    $("#datepicker2").datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );
  } );
    </script>

@yield('script')

</body>

</html>
