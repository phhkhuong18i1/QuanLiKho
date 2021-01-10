<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('view', function () {
    return view('view');
});
Route::get('qlkho/dangki','App\Http\Controllers\UserController@getDangKi');
Route::post('qlkho/dangki','App\Http\Controllers\UserController@postDangKi');
Route::get('qlkho/dangnhap', 'App\Http\Controllers\UserController@getDangNhap');
Route::post('qlkho/dangnhap', 'App\Http\Controllers\UserController@postDangNhap');
Route::get('qlkho/dangxuat', 'App\Http\Controllers\UserController@getDangXuat');

Route::get('qlkho/lienhe', 'App\Http\Controllers\PageController@getLienHe');
Route::post('qlkho/lienhe', 'App\Http\Controllers\PageController@postLienHe');
Route::post('qlkho/lienhe/xoa/{id}', 'App\Http\Controllers\PageController@postXoa');

Route::get('qlkho/phanhoi/{id}', 'App\Http\Controllers\PageController@getPhanHoi');
Route::post('qlkho/phanhoi/{id}', 'App\Http\Controllers\PageController@postPhanHoi');



Route::get('lay-lai-mat-khau','App\Http\Controllers\UserController@getResetPass');
Route::post('lay-lai-mat-khau','App\Http\Controllers\UserController@sendCodeResetPass');
Route::get('passreset','App\Http\Controllers\UserController@ResetPass')->name('get.link.reset');
Route::post('passreset','App\Http\Controllers\UserController@saveResetPass');
// * Route quản lý
Route::group(['prefix' => 'qlkho','middleware'=>'userLogin'], function () {

    Route::get('index','App\Http\Controllers\PageController@getIndex');
    // NOTE: Quản lý chất lượng
    Route::group(['prefix' => 'chatluong'], function () {
        // + Danh sách chất lượng
        Route::get('danhsach', 'App\Http\Controllers\ChatLuongController@getDanhSach');

        // + Sửa chất lượng
        Route::get('sua/{id}', 'App\Http\Controllers\ChatLuongController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\ChatLuongController@postSua');

        // + Thêm chất lượng
        Route::get('them', 'App\Http\Controllers\ChatLuongController@getThem');
        Route::post('them', 'App\Http\Controllers\ChatLuongController@postThem');

        // + Xóa chất lượng
        Route::get('xoa/{id}', 'App\Http\Controllers\ChatLuongController@postXoa');
    });

    // NOTE: Quản lý công trình
    Route::group(['prefix' => 'congtrinh'], function () {
        // + Danh sách công trình
        Route::get('danhsach', 'App\Http\Controllers\CongTrinhController@getDanhSach');

        // + Sửa công trình
        Route::get('sua/{id}', 'App\Http\Controllers\CongTrinhController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\CongTrinhController@postSua');

        // + Thêm công trình
        Route::get('them', 'App\Http\Controllers\CongTrinhController@getThem');
        Route::post('them', 'App\Http\Controllers\CongTrinhController@postThem');

        // + Xóa công trình
        Route::get('xoa/{id}', 'App\Http\Controllers\CongTrinhController@postXoa');
    });

    // NOTE: Quản lý đơn vị tính
    Route::group(['prefix' => 'donvitinh'], function () {
        // + Danh sách đơn vị tính
        Route::get('danhsach', 'App\Http\Controllers\DonViTinhController@getDanhSach');

        // + Sửa đơn vị tính
        Route::get('sua/{id}', 'App\Http\Controllers\DonViTinhController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\DonViTinhController@postSua');

        // + Thêm đơn vị tính
        Route::get('them', 'App\Http\Controllers\DonViTinhController@getThem');
        Route::post('them', 'App\Http\Controllers\DonViTinhController@postThem');

        // + Xóa đơn vị tính
        Route::get('xoa/{id}', 'App\Http\Controllers\DonViTinhController@postXoa');
    });

    // NOTE: Quản lý kho
    Route::group(['prefix' => 'kho'], function () {
        // + Danh sách kho
        Route::get('danhsach', 'App\Http\Controllers\KhoController@getDanhSach');

        // + Sửa kho
        Route::get('sua/{id}', 'App\Http\Controllers\KhoController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\KhoController@postSua');

        // + Thêm kho
        Route::get('them', 'App\Http\Controllers\KhoController@getThem');
        Route::post('them', 'App\Http\Controllers\KhoController@postThem');

        // + Xóa kho
        Route::get('xoa/{id}', 'App\Http\Controllers\KhoController@postXoa');
    });

    // NOTE: Quản lý khu vực
    Route::group(['prefix' => 'khuvuc'], function () {
        // + Danh sách khu vực
        Route::get('danhsach', 'App\Http\Controllers\KhuVucController@getDanhSach');

        // + Sửa khu vực
        Route::get('sua/{id}', 'App\Http\Controllers\KhuVucController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\KhuVucController@postSua');

        // + Thêm khu vực
        Route::get('them', 'App\Http\Controllers\KhuVucController@getThem');
        Route::post('them', 'App\Http\Controllers\KhuVucController@postThem');

        // + Xóa khu vực
        Route::get('xoa/{id}', 'App\Http\Controllers\KhuVucController@postXoa');
    });

    // NOTE: Quản lý nhà phân phối
    Route::group(['prefix' => 'nhaphanphoi'], function () {
        // + Danh sách nhà phân phối
        Route::get('danhsach', 'App\Http\Controllers\NhaPhanPhoiController@getDanhSach');

        // + Sửa nhà phân phối
        Route::get('sua/{id}', 'App\Http\Controllers\NhaPhanPhoiController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\NhaPhanPhoiController@postSua');

        // + Thêm nhà phân phối
        Route::get('them', 'App\Http\Controllers\NhaPhanPhoiController@getThem');
        Route::post('them', 'App\Http\Controllers\NhaPhanPhoiController@postThem');

        // + Xóa nhà phân phối
        Route::get('xoa/{id}', 'App\Http\Controllers\NhaPhanPhoiController@postXoa');
    });

    // NOTE: Quản lý nhà sản xuất
    Route::group(['prefix' => 'nhasanxuat'], function () {
        // + Danh sách nhà sản xuất
        Route::get('danhsach', 'App\Http\Controllers\NhaSanXuatController@getDanhSach');

        // + Sửa nhà sản xuất
        Route::get('sua/{id}', 'App\Http\Controllers\NhaSanXuatController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\NhaSanXuatController@postSua');

        // + Thêm nhà sản xuất
        Route::get('them', 'App\Http\Controllers\NhaSanXuatController@getThem');
        Route::post('them', 'App\Http\Controllers\NhaSanXuatController@postThem');

        // + Xóa nhà sản xuất
        Route::get('xoa/{id}', 'App\Http\Controllers\NhaSanXuatController@postXoa');
    });

    // NOTE: Quản lý nhóm vật tư
    Route::group(['prefix' => 'nhomvattu'], function () {
        // + Danh sách nhóm vật tư
        Route::get('danhsach', 'App\Http\Controllers\NhomVatTuController@getDanhSach');

        // + Sửa nhóm vật tư
        Route::get('sua/{id}', 'App\Http\Controllers\NhomVatTuController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\NhomVatTuController@postSua');

        // + Thêm nhóm vật tư
        Route::get('them', 'App\Http\Controllers\NhomVatTuController@getThem');
        Route::post('them', 'App\Http\Controllers\NhomVatTuController@postThem');

        // + Xóa nhóm vật tư
        Route::get('xoa/{id}', 'App\Http\Controllers\NhomVatTuController@postXoa');
    });

    // NOTE: Quản lý phiếu nhập kho
    Route::group(['prefix' => 'nhapkho'], function () {
        // + Danh sách phiếu nhập kho
        Route::get('danhsach', 'App\Http\Controllers\NhapKhoController@getDanhSach');

        // + Sửa phiếu nhập kho
        Route::get('sua/{id}', ['as' => 'chucnang.nhapkho.getEdit','uses' => 'App\Http\Controllers\NhapkhoController@getEdit']);
        Route::post('sua/{id}', ['as' => 'chucnang.nhapkho.postEdit','uses' => 'App\Http\Controllers\NhapkhoController@postEdit']);
        
        // + Thêm phiếu nhập kho
        // Route::get('nhap', 'App\Http\Controllers\NhapKhoController@getNhapKho');
        // Route::post('nhap', 'App\Http\Controllers\NhapKhoController@postNhapKho');

        // + Xóa phiếu nhập kho
        Route::get('xoa/{id}', 'App\Http\Controllers\NhapKhoController@postXoa');

        // + In phiếu nhập kho
        Route::get('in', 'App\Http\Controllers\NhapKhoController@getPDF1');
        Route::get('xem', 'App\Http\Controllers\NhapKhoController@getXem');
        Route::get('xemNK', 'App\Http\Controllers\NhapKhoController@getXemNK');
        Route::get('inNK', 'App\Http\Controllers\NhapKhoController@getInNK');
        Route::get('innhapkho/{id}', 'App\Http\Controllers\NhapKhoController@getPDF');
       
        Route::get('nhap',  'App\Http\Controllers\NhapkhoController@getList');
        Route::post('nhap', 'App\Http\Controllers\NhapkhoController@postList');     
        Route::get('vattu/ajax-call', function( Request $req){ 
            $vattu_id = $req->get('vattu_id');
            $country = DB::table('vattu')
                ->where('vattu.id',$vattu_id)
                ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
                ->select('vattu.*','donvitinh.dvt_ten')
                ->get();
            return Response::json($country);
        });

        Route::get('nhaphang/{id}/{qty}', 'App\Http\Controllers\NhapkhoController@postNhaphang');
        Route::get('xoaCart/{rowId}','App\Http\Controllers\NhapkhoController@getXoaCart');
        Route::get('xoaCart1/{id}','App\Http\Controllers\NhapKhoController@getXoaCart1');
        Route::get('SaveCart-list/{rowId}/{qty}','App\Http\Controllers\NhapkhoController@getSaveListCart');
        Route::get('SaveCart-list1/{rowId}/{qty}','App\Http\Controllers\NhapkhoController@getSaveListCart1');

    });

    // NOTE: Quản lý phiếu xuất kho
    Route::group(['prefix' => 'xuatkho'], function () {
        // + Danh sách phiếu xuất kho
        Route::get('danhsach', 'App\Http\Controllers\XuatKhoController@getDanhSach');

        // + Sửa phiếu xuất kho
        Route::get('sua/{id}', 'App\Http\Controllers\XuatKhoController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\XuatKhoController@postSua');

        // + Thêm phiếu xuất kho
        // Route::get('xuat', 'XuatKhoController@getXuatKho');
        // Route::post('xuat', 'XuatKhoController@postXuatKho');

        // + Xóa phiếu xuất kho
        Route::get('xoa/{id}', 'App\Http\Controllers\XuatKhoController@postXoa');

        // + In phiếu xuất kho
        Route::get('inphieu', 'App\Http\Controllers\XuatKhoController@getPDF');
        Route::get('xem', 'App\Http\Controllers\XuatKhoController@getXem');
        Route::get('xemXK', 'App\Http\Controllers\XuatKhoController@getXemXK');
        Route::get('inXK', 'App\Http\Controllers\XuatKhoController@getInXK');
        Route::get('in/{id}', 'App\Http\Controllers\XuatKhoController@getPhieuDon');

        Route::get('xuat', 'App\Http\Controllers\XuatkhoController@getList');
        Route::post('xuat',  'App\Http\Controllers\XuatkhoController@postList');

        Route::get('vattu/ajax-call', function( Request $req){
            $vattu_id = $req->get('vattu_id');
            $country = DB::table('vattukho')
            ->where('vattukho.vattu_id',$vattu_id)
            ->join('vattu','vattu.id','=','vattukho.vattu_id')
            ->join('khovt','khovt.id','=','vattukho.kho_id')
            ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
            ->select('vattu.vt_ten','donvitinh.dvt_ten','khovt.kho_ten','vattukho.vattu_id','vattukho.soluong_ton','khovt.id')
            ->get();
            return Response::json( $country);
        });

        Route::get('xuathang/{id}/{qty}', ['as' => 'chucnang.xuatkho.postXuathang','uses' => 'App\Http\Controllers\XuatkhoController@postXuathang']);
        Route::get('xoaCart/{rowId}','App\Http\Controllers\XuatKhoController@getXoaCart');
        Route::get('xoaXK/{id}','App\Http\Controllers\XuatKhoController@getXoaCart1');
        Route::get('SaveCart-list/{rowId}/{qty}','App\Http\Controllers\XuatKhoController@getSaveListCart');
        Route::get('SaveCart-list1/{rowId}/{qty}','App\Http\Controllers\XuatKhoController@getSaveListCart1');
    });

    // NOTE: Quản lý vật tư
    Route::group(['prefix' => 'vattu'], function () {
        // + Danh sách vật tư
        Route::get('danhsach', 'App\Http\Controllers\VatTuController@getDanhSach');
        Route::get('danhsachton', 'App\Http\Controllers\VatTuController@getDanhSachTon');
        Route::get('danhsachton/{id}', 'App\Http\Controllers\VatTuController@getDanhSachTonKho');
        // + Sửa vật tư
        Route::get('sua/{id}', 'App\Http\Controllers\VatTuController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\VatTuController@postSua');

        // + Thêm vật tư
        Route::get('them', 'App\Http\Controllers\VatTuController@getThem');
        Route::post('them', 'App\Http\Controllers\VatTuController@postThem');

        // + Nhập vật tư vào kho
        Route::get('nhap', 'App\Http\Controllers\VatTuController@getNhap');
        Route::post('nhap', 'App\Http\Controllers\VatTuController@postNhap');

        // + In danh sách tồn
        Route::get('inton', 'App\Http\Controllers\VatTuController@getPDF');

        // + Xóa vật tư
        Route::get('xoa/{id}', 'App\Http\Controllers\VatTuController@postXoa');
    });

    // NOTE: Quản lý thông tin cá nhân của thủ kho
    Route::group(['prefix' => 'nhanvien'], function () {
        // + Lấy thông tin
        Route::get('danhsach', 'App\Http\Controllers\UserController@getDanhSach');
       
        // + Sửa 
        Route::get('sua/{id}', 'App\Http\Controllers\UserController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\UserController@postSua');

        Route::get('them', 'App\Http\Controllers\UserController@getThem');
        Route::post('them', 'App\Http\Controllers\UserController@postThem');

        Route::get('thongtin', 'App\Http\Controllers\UserController@getThongTin');
        Route::post('thongtin', 'App\Http\Controllers\UserController@postThongTin');

        Route::get('doimatkhau', 'App\Http\Controllers\UserController@getDoiMK');
        Route::post('doimatkhau', 'App\Http\Controllers\UserController@postDoiMK');


        // + Thêm 
        Route::get('them', 'App\Http\Controllers\UserController@getThem');
        Route::post('them', 'App\Http\Controllers\UserController@postThem');

    });

    Route::group(['prefix' => 'baocao'], function () {
        // + Lấy thông tin
        Route::get('tonkho', 'App\Http\Controllers\BaoCaoController@getTonKho');
        Route::get('khohang/{id}', 'App\Http\Controllers\BaoCaoController@getKhoHang');
        Route::get('npp/{id}', 'App\Http\Controllers\BaoCaoController@getNPP');
        Route::get('nhomvt/{id}', 'App\Http\Controllers\BaoCaoController@getNhomVT');
        Route::get('innvt/{id}','App\Http\Controllers\BaoCaoController@getPDFNVT');
        Route::get('inkho/{id}','App\Http\Controllers\BaoCaoController@getPDFK');
        Route::get('innpp/{id}','App\Http\Controllers\BaoCaoController@getPDFNPP');

        Route::get('vtnhap','App\Http\Controllers\BaoCaoController@getVTNhap');
        Route::get('vtxuat','App\Http\Controllers\BaoCaoController@getVTXuat');
    });

    Route::group(['prefix' => 'thongke'], function () {
        // + Lấy thông tin
    Route::post('filter-by-day','App\Http\Controllers\ThongKeController@filter_by_date');
    Route::post('dasboard-filter','App\Http\Controllers\ThongKeController@dasboard_filter');
    Route::post('chart30days','App\Http\Controllers\ThongKeController@chart30days');
    
    Route::get('doanhthu','App\Http\Controllers\ThongKeController@getDoanhThu');
    Route::post('filter-day','App\Http\Controllers\ThongKeController@filter_day');
    Route::post('timkiemtheo','App\Http\Controllers\ThongKeController@timkiemtheo');

    });
});
