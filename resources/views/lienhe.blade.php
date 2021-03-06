@extends('layout.index')
@section('content')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Trang chủ</a></li>
              <li><i class="fa fa-phone"></i>Liên hệ</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-6">
            <div class="recent">
              <p style="font-size: 30px"><b>Đóng góp ý kiến về ứng dụng cho chúng tôi</b></p>
            </div>
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            @if (session('thongbao'))
                    <div class="col-lg-12 alert alert-success">
                        <strong>{{ session('thongbao') }}</strong>
                    </div>
                @endif
            <form action="qlkho/lienhe" method="post" role="form" class="contactForm">
            @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tên" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Chủ đề" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="nội dung"></textarea>
                <div class="validation"></div>
              </div>

              <div class="text-center"><button type="submit" class="btn btn-primary btn-lg">Gửi</button></div>
            </form>
          </div>

          <div class="col-lg-6">
            <div class="recent">
              <p style="font-size:25px">Liên hệ với chúng tôi</p>
            </div>
            <div class="">
              <p>Nếu bạn có thắc mắc gì xin hãy liên hệ với chúng tôi.Xin cảm ơn</p>

              <p>Địa chỉ:</p>69 Nguyễn Đình Hiến, Quận Ngũ Hành Sơn, TP. Đà Nẵng<br>
              <p>Phone:</p>345 578 59 45 416</br>
              <p>Email:</p>pkhkhuong.18i@cit.udn.vn</br>
              <p>Fax:</p>123 456 789
            </div>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
@endsection