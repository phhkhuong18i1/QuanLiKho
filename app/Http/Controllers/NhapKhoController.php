<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhapKho;
use App\ChiTietNhapKho;
use App\VatTuKho;
use App\Kho;
use App\VatTu;
use App\NhanVien;
use PDF;
use DB;
use Cart;
use App\NhaPhanPhoi;


class NhapKhoController extends Controller
{
    public function getDanhSach()
    {
        $pnk = PhieuNhapKho::orderBy('ngaylap','DESC')->get();
        return view('phieunhapkho.danhsach', ['pnk' => $pnk]);
    }

    public function getList()
	{
		$data = DB::table('nhaphanphoi')->get();
		$data1 = DB::table('vattu')
			->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
			->select('vattu.*','donvitinh.dvt_ten')
			->get();
		$dataKho = DB::table('khovt')->get();
		$dataDonvitinh = DB::table('donvitinh')->get();
		$content = Cart::content();
		// Cart::destroy();
		return view('phieunhapkho.nhap',compact('data','data1','dataKho','dataDonvitinh','content'));
    }
    public function postList(Request $request)
	{
		$this->validate($request,
    
        [   'state_id' => 'required',
            'txtLyDo' => 'required',
           ],
        [
            'state_id.required' => 'Chưa chọn nhà phân phối',
            'txtLyDo.required' => 'Chưa nhập lý do',
        ]
        
        
    );
		$id_user = $request->input('txtNV');
		$content = Cart::content();
		$total = Cart::subtotal(0,".","");
		if(count($content) == 0)
		{
			return redirect('qlkho/nhapkho/nhap')->with('thongbao','Chưa có vật tư');
		}
		else{
		$nhapkho = new PhieuNhapKho;
        $nhapkho->ma = $request->input('txtID');
        $nhapkho->lydo =$request->input('txtLyDo');
		$nhapkho->ngaylap = date('Y-m-d');
        $nhapkho->tongtien = $total;
        $nhapkho->npp_id = $request->input('state_id') ;
		$nhapkho->nv_id = $id_user;
		$nhapkho->save();
		foreach ($content as  $item) {
			$chitiet = new ChiTietNhapKho;
			$chitiet->ctnk_soluong = $item->qty;
			$chitiet->ctnk_thanhtien = $item->qty*$item->price;
			$chitiet->vt_id = $item->id;
			$chitiet->pnk_id = $nhapkho->id;
			$chitiet->kho_id = $item->options->idKho;
			$chitiet->save();
			$vt = DB::table('vattukho')
				->where(
					'vattu_id',$item->id
					)
				->where('kho_id',$item->options->idKho
					)
				->first();
			if (!is_null($vt)) {
				DB::table('vattukho')
				->where(
					'vattu_id',$item->id
					)
				->where('kho_id',$item->options->idKho
					)
				->update([
					'soluong_nhap' => $vt->soluong_nhap + $item->qty,
					'soluong_ton' => $vt->soluong_ton + $item->qty,
					]);
				
			} else {
				$soluong = new VatTuKho;
				$soluong->vattu_id = $item->id;
				$soluong->kho_id = $item->options->idKho;
				$soluong->soluong_nhap = $item->qty;
				$soluong->soluong_ton = $item->qty;
				$soluong->soluong_xuat = 0;
				$soluong->save(); 
			}
		}

		Cart::destroy();

		return redirect('qlkho/nhapkho/xemNK');
	}
}
    public function postNhaphang(Request $request)
	{
		if($request->ajax()) {
            $id = $request->get('id');
            $qty = $request->get('qty');
            $vt = DB::table('vattu')
            	->where('vattu.id',$id) 
            	->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
				->select('vattu.*','donvitinh.dvt_ten')
            	->first();
            $idKho = $request->get('idKho');
            $idnpp = $request->get('idnpp');
            $kho = DB::table('khovt')->where('id',$idKho)->first();
            $npp = DB::table('nhaphanphoi')->where('id',$idnpp)->first();
            Cart::add(['id' => $id, 'name' => $vt->vt_ten, 'qty' => $qty, 'price' => $vt->giatien,'weight'=>$vt->dvt_ten,'options' => ['size' => $vt->dvt_ten,'kho'=>$kho->kho_ten,'idKho'=>$kho->id]]);
			$content = Cart::content();
			return view('phieunhapkho.nhap_ds',['content1'=>$content]);
        }

    }
    public function getXoaCart($id)
    {
        
       $cart = Cart::content()->where('rowId',$id);
        if(empty($cart))
        {
            return back();
        }
        else
        {
        Cart::remove($id);
        }
        $content = Cart::content();
        return view('phieunhapkho.nhap_ds',['content1'=>$content]);
        
        
	}
	
	public function getSaveListCart(Request $request,$id,$quanty)
    {   
        
      
	   $cart = Cart::content()->where('rowId',$id);
		if ($quanty == 0) { 
			
			$cart->remove($id);

			
		}
		else{
           Cart::update($id,['qty'=>$quanty]);
		}
       
        
		$content = Cart::content();
        return view('phieunhapkho.nhap_ds',['content1'=>$content]);

	}
	
	public function getSaveListCart1(Request $request,$id,$quanty)
    {   
        
      
		$nkID = $request->get('nkID');
		$khoid = $request->khoid;
		$slnhap = VatTuKho::where('vattu_id',$id)->where('kho_id',$khoid)->first();
	
		if ($quanty == 0) {  
		$ct = ChiTietNhapKho::where('vt_id',$id)->where('pnk_id',$nkID)->first();
			DB::table('chitietnhapkho')
			->where('vt_id',$id)
			->where('pnk_id',$nkID)
			->delete();
			$vt = DB::table('vattu')
            	->where('vattu.id',$id)
            	->first();
            DB::table('chitietnhapkho')
			->where('vt_id',$id)
			->where('pnk_id',$nkID)
			->where('kho_id',$khoid)
			->update([
					'ctnk_soluong' => $quanty,
					'ctnk_thanhtien' => $quanty * $vt->giatien,
				]);
			$tong = DB::table('chitietnhapkho')
				->where('pnk_id',$nkID)
				->sum('ctnk_thanhtien');
				
			DB::table('phieunhapkho')
				->where('id',$nkID)
				->update([
					'tongtien' =>$tong
					]);
			DB::table('vattukho')->where('vattu_id',$id)
				->where('kho_id',$khoid)
				->update([
						'soluong_nhap' => $slnhap->soluong_nhap - $ct->ctnk_soluong,
						'soluong_ton' => $slnhap->soluong_ton - $ct->ctnk_soluong
					]);
					$nhapkho = DB::table('phieunhapkho')->where('id',$nkID)->first();
					$chitiet = DB::table('chitietnhapkho')->where('pnk_id',$nkID)->get();
					return view('phieunhapkho.sua_ds',['chitiet'=>$chitiet,'nhapkho'=>$nhapkho]);
		}
		else{
			$sl = ChiTietNhapKho::where('vt_id',$id)->where('pnk_id',$nkID)->first();
            if($quanty < $sl->ctnk_soluong )
            {
                $trudi = $sl->ctnk_soluong - $quanty;
				DB::table('vattukho')->where('vattu_id',$id)
				->where('kho_id',$khoid)
                ->update([
                    'soluong_ton'   =>$slnhap->soluong_ton - $trudi,
                    'soluong_nhap' => $slnhap->soluong_nhap - $trudi
                ]);
            }
            else{
                $congthem = $quanty - $sl->ctnk_soluong ;
                DB::table('vattukho')->where('vattu_id',$id)->where('kho_id',$khoid)
                ->update([
                    'soluong_ton'  => $slnhap->soluong_ton + $congthem,
                    'soluong_nhap' => $slnhap->soluong_nhap + $congthem
                ]);
            }
            $vt = DB::table('vattu')
            	->where('vattu.id',$id)
            	->first();
            DB::table('chitietnhapkho')
			->where('vt_id',$id)
			->where('pnk_id',$nkID)
			->update([
					'ctnk_soluong' => $quanty,
					'ctnk_thanhtien' => $quanty * $vt->giatien,
				]);
			$tong = DB::table('chitietnhapkho')
				->where('pnk_id',$nkID)
				->sum('ctnk_thanhtien');
			DB::table('phieunhapkho')
				->where('id',$nkID)
				->update([
					'tongtien' =>$tong
					]);
		}
       
        $nhapkho = DB::table('phieunhapkho')->where('id',$nkID)->first();
		$chitiet = DB::table('chitietnhapkho')->where('pnk_id',$nkID)->get();
        return view('phieunhapkho.sua_ds',['chitiet'=>$chitiet,'nhapkho'=>$nhapkho]);

    }



    
    
	public function getEdit($id)
	{
		$nhaphanphoi = NhaPhanPhoi::all();
		$nhapkho = PhieuNhapKho::where('id',$id)->first();
		$chitiet = DB::table('chitietnhapkho')->where('pnk_id',$id)->get();
		return view('phieunhapkho.sua',compact('nhapkho','chitiet','nhaphanphoi'));
	}

	public function postEdit(Request $request, $id)
	{
		DB::table('phieunhapkho')
			->where('id',$id)
			->update([
				'ngaylap' =>	$request->input('txtDate'),
				'npp_id'	=>		$request->input('state_id'),
				'lydo'	=>  	$request->input('txtLyDo'),
				]);
		return redirect('qlkho/nhapkho/danhsach')->with('thongbao', 'Sửa thành công');
	}



	
	public function getEditPro()
	{	
		if(Request::ajax()) {
            $nkID = Request::get('nkID');
            $qty = Request::get('qty');
            $vtID = Request::get('vtID');
            $vt = DB::table('vattu')
            	->where('vattu.id',$vtID)
            	->first();
            DB::table('chitietnhapkho')
			->where('vt_id',$vtID)
			->where('pnk_id',$nkID)
			->update([
					'ctnk_soluong' => $qty,
					'ctnk_thanhtien' => $qty * $vt->vt_gia,
				]);
			$tong = DB::table('chitietnhapkho')
				->where('nk_id',$nkID)
				->sum('ctnk_thanhtien');
			DB::table('nhapkho')
				->where('id',$nkID)
				->update([
					'nk_tongtien' =>$tong
					]);
            echo "oke";
        }
		

	}

    public function postXoa($id)
    {	
		$ctnk = ChiTietNhapKho::where('pnk_id',$id)->get();
		foreach($ctnk as $ct)
		{
			$vtkho = VatTuKho::where('vattu_id',$ct->vt_id)->where('kho_id',$ct->kho_id)->first();
            DB::table('vattukho')->where('vattu_id',$ct->vt_id)
            ->where('kho_id',$ct->kho_id)
            ->update([
                'soluong_ton' => $vtkho->soluong_ton - $ct->ctnk_soluong,
                'soluong_nhap'=> $vtkho->soluong_xuat - $ct->ctnk_soluong
            ]);
            $chitiet = ChiTietNhapKho::find($ct->id);
            $chitiet->delete();
		}
        $pnk = PhieuNhapKho::find($id);
        try {
            $pnk->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/nhapkho/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/nhapkho/danhsach')->with('thongbao', 'Xóa thành công');
	}
	public function getXoaCart1(Request $request,$id)
	{
		$pnkid = $request->get('nkID');
		$khoid = $request->get('khoid');
		$slnhap = VatTuKho::where('vattu_id',$id)->where('kho_id',$khoid)->first();
		$ct = ChiTietNhapKho::where('vt_id',$id)
		->where('pnk_id',$pnkid)->first();
		DB::table('chitietnhapkho')
			->where('vt_id',$id)
			->where('pnk_id',$pnkid)
			->delete();
		$tong = DB::table('chitietnhapkho')->where('pnk_id',$pnkid)->sum('ctnk_thanhtien');
		DB::table('phieunhapkho')->where('id',$pnkid)->update([
			'tongtien' => $tong
		]);
		
		DB::table('vattukho')->where('vattu_id',$id)->where('kho_id',$khoid)->update([
			'soluong_nhap' => $slnhap->soluong_nhap - $ct->ctnk_soluong,
			'soluong_ton' => $slnhap->soluong_ton - $ct->ctnk_soluong
		]);
		
			$nhapkho = DB::table('phieunhapkho')->where('id',$pnkid)->first();
			$chitiet = DB::table('chitietnhapkho')->where('pnk_id',$pnkid)->get();
			return view('phieunhapkho.sua_ds',['chitiet'=>$chitiet,'nhapkho'=>$nhapkho]);
		
	}

    public function getPDF($id)
    {
        $nhapkho = PhieuNhapKho::where('id',$id)->first();
        $chitiet = ChiTietNhapKho::where('pnk_id',$id)->get();
        $nv = NhanVien::where('id',$nhapkho->nv_id)->first();
        $npp = NhaPhanPhoi::where('id',$nhapkho->npp_id)->first();
        // print_r($khachhang);
        $pdf = PDF::loadView('phieunhapkho.phieu',compact('nhapkho','chitiet','nv','npp'));
        return $pdf->stream();
	}
	public function getPDF1()
    {
        $nhapkho = PhieuNhapKho::all();
       
        // print_r($khachhang);
        $pdf = PDF::loadView('phieunhapkho.phieudon',compact('nhapkho'));
        return $pdf->stream();
    }

	public function getXem(Request $request)
	{
		$id = $request->get('ID');
        $nhapkho = DB::table('phieunhapkho')->where('id',$id)->first();
        $chitietnk = ChiTietNhapKho::where('pnk_id',$id)->get();
        foreach($chitietnk as $nk)
        {
			$nk->vattu;
			$nk->kho;
        }
        $nv = DB::table('nhanvien')->where('id',$nhapkho->nv_id)->first();
        $npp = DB::table('nhaphanphoi')->where('id',$nhapkho->npp_id)->first();

        return response()->json([
            'nhapkho'=>$nhapkho,
            'chitietnk'=>$chitietnk,
            'nv'=>$nv,
            'npp'=>$npp
            
            ]);
	}
	public function getInNK(Request $request)
	{
		$id_user = $request->input('txtNV');
		$content = Cart::content();
		$total = Cart::subtotal(0,".","");
		$ma = $request->input('txtID');
		$lydo =$request->input('txtLyDo');
		$date = $request->input('txtDate');
        $tongtien = $total;
        $npp_id = $request->input('state_id') ;
        $nv = NhanVien::where('id',$id_user)->first();
        $npp = NhaPhanPhoi::where('id',$npp_id)->first();
			$data = [
				'ma' => $ma,
				'lydo' =>$lydo,
				'tongtien'=>$tongtien,
				'date'=>$date
			];

		$pdf = PDF::loadView('phieunhapkho.in',compact('content','data','nv','npp'));
		return $pdf->stream();
	}
   public function getXemNK()
   {
	$pnk = PhieuNhapKho::orderBy('id','DESC')->first();
	$chitiet = ChiTietNhapKho::where('pnk_id',$pnk->id)->get();
	$nv = NhanVien::where('id',$pnk->nv_id)->first();
	$npp = NhaPhanPhoi::where('id',$pnk->npp_id)->first();
	return view('phieunhapkho.in',compact('pnk','chitiet','nv','npp'));
   }
}
