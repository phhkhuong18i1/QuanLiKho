<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuXuatKho;
use App\ChiTietXuatKho;
use App\VatTuKho;
use App\CongTrinh;
use App\VatTu;
use App\Kho;
use App\ThongKe;
use PDF;
use DB;
use Cart;

class XuatKhoController extends Controller
{
    public function getDanhSach()
    {
        $pxk = PhieuXuatKho::all();
        $ctxk = ChiTietXuatKho::all();
        return view('phieuxuatkho.danhsach', ['pxk' => $pxk, 'ctxk' => $ctxk]);
    }
 
    public function getList()
	{
		$data = DB::table('congtrinh')->get();
		$data1 = DB::table('vattu')
			->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
			->select('vattu.*','donvitinh.dvt_ten')
            ->get();
        
		$dataKho = DB::table('khovt')->get();
		$content = Cart::content();
		return view('phieuxuatkho.nhap',compact('data','data1','dataKho','content'));
	}

    public function postList(Request $request)
	{
		$id_user = $request->input('txtNV');
		$content = Cart::content();
        $total = Cart::subtotal(0,".","");
        $quanty = Cart::count();
		$xuatkho = new PhieuXuatKho;
		$xuatkho->xk_ma = $request->input('txtID');
		$xuatkho->xk_ngaylap = date('Y-m-d');
		$xuatkho->xk_lydo = $request->input('txtLyDo');
		$xuatkho->xk_tongtien = $total;
		$xuatkho->congtrinh_id =  $request->input('selCT') ;
		$xuatkho->nv_id = $id_user;
		$xuatkho->save();
		foreach ($content as  $item) {
			$chitiet = new ChiTietXuatKho;
			$chitiet->ctxk_soluong =  $item->qty;
			$chitiet->ctxk_thanhtien = $item->qty*$item->price;;
			$chitiet->vattu_id = $item->id;
            $chitiet->phieuxuatkho_id = $xuatkho->id;
            $chitiet->kho_id = $item->options->idKho;
			$chitiet->save();
			$vt = VatTuKho::where('vattu_id',$item->id)
				->where('kho_id',$item->options->idKho
					)
				->first();
			if (!is_null($vt)) {
				VatTuKho::where('vattu_id',$item->id)
				->where('kho_id',$item->options->idKho
					)
				->update([
					'soluong_xuat' => $vt->soluong_xuat + $item->qty,
					'soluong_ton' => $vt->soluong_ton - $item->qty,
					]);
				
			} 
        }
        
        $thongke = ThongKe::where('date',date('Y-m-d'))->first();
        if(!is_null($thongke))
        {
            DB::table('thongke')
				->where(
					'date',date('Y-m-d')
					)
				->update([
					'SoLuong' => $thongke->SoLuong+$quanty,
                    'TongTien' => $thongke->TongTien+$total,
                    'SoDon' => $thongke->SoDon+1
					]);
        }else{
            $tk = new ThongKe;
            $tk->date = date('Y-m-d');
            $tk->SoLuong = $quanty;
            $tk->TongTien = $total;
            $tk->SoDon=1;
            $tk->save();

        }

        Cart::destroy();
        
       
		// echo "string";
        return redirect('qlkho/xuatkho/xuat')->with('thongbao', 'Xuất kho thành công');
	}
    public function postXuathang(Request $request)
	{
		if($request->ajax()) {
			$idKho = $request->get('idKho');
            $id = $request->get('id');
            $qty = $request->get('qty');
            $vt = DB::table('vattu')
            	->where('vattu.id',$id)
                ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
				->select('vattu.*','donvitinh.dvt_ten')
            	->first();
            $kho = Kho::where('id',$idKho)->first();
            $vtkho = VatTuKho::where('vattu_id', $id)
            	->where('kho_id',$idKho)
            	->first();
            if ($vtkho->soluong_ton >= $qty) {
            	Cart::add(['id' => $id, 'name' => $vt->vt_ten, 'qty' => $qty, 'price' => $vt->giatien,'weight'=>$vtkho->soluong_ton,'options' => ['size' => $vt->dvt_ten,'kho'=>$kho->kho_ten,'idKho'=>$kho->id]]);
            	 echo "oke";
            } else {
            	echo "<script>
            		alert('Số lượng xuất lớn hơn số lượng tồn trong kho!');
            	</script>";
            }
            
            
           
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
        return view('phieuxuatkho.nhap_ds',['content1'=>$content]);
        
        
	}
	
	public function getSaveListCart(Request $request,$id,$quanty)
    {   
        
      
       $cart = Cart::content()->where('rowId',$id)->first();
        
		if ($quanty == 0) { 
			
			$cart->remove($id);

			
		}
		
        elseif($quanty > $cart->weight)
         {
            
            
        }
        else{ 
            Cart::update($id,['qty'=>$quanty]);  
          
        }
        $content1 = Cart::content();

        return view('phieuxuatkho.nhap_ds',['content1'=>$content1]);

    }
    
    public function getSaveListCart1(Request $request,$id,$quanty)
    {   
        
      
        $xkID = $request->get('xkID');
        $soluongton = VatTu::where('id',$id)->first();
		if ($quanty == 0) { 
			
			
			DB::table('chitietxuatkho')
			->where('vattu_id',$id)
			->where('phieuxuatkho_id',$xkID)
			->delete();
			$vt = DB::table('vattu')
            	->where('vattu.id',$id)
            	->first();
            DB::table('chitietxuatkho')
			->where('vattu_id',$id)
			->where('phieuxuatkho_id',$nkID)
			->update([
					'ctxk_soluong' => $quanty,
					'ctxk_thanhtien' => $quanty * $vt->giatien,
				]);
			$tong = DB::table('chitietxuatkho')
				->where('phieuxuatkho_id',$xkID)
				->sum('ctxk_thanhtien');
				
			DB::table('phieuxuatkho')
				->where('id',$xkID)
				->update([
					'xk_tongtien' =>$tong
					]);
					if($tong == 0)
					{
						DB::table('phieuxuatkho')
						->where('id',$xkID)
						->delete();
					}
		}
        elseif($quanty > $soluongton->soluong_ton)
        {
        }
        else
        {
		  
            $vt = DB::table('vattu')
            	->where('vattu.id',$id)
            	->first();
            DB::table('chitietxuatkho')
			->where('vattu_id',$id)
			->where('phieuxuatkho_id',$nkID)
			->update([
					'ctxk_soluong' => $quanty,
					'ctxk_thanhtien' => $quanty * $vt->giatien,
				]);
			$tong = DB::table('chitietxuatkho')
				->where('phieuxuatkho_id',$nkID)
				->sum('ctxk_thanhtien');
			DB::table('phieuxuatkho')
				->where('id',$xkID)
				->update([
					'tongtien' =>$tong
					]);
		}
       
        $xuatkho = DB::table('phieuxuatkho')->where('id',$xkID)->first();
		$chitiet = DB::table('chitietxuatkho')->where('phieuxuatkho_id',$xkID)->get();
        return view('phieuxuatkho.sua_ds',['chitiet'=>$chitiet,'xuatkho'=>$xuatkho]);

    }
    

    public function getSua($id)
    {
        $xuatkho = PhieuXuatKho::where('id',$id)->first();
		$chitiet = DB::table('chitietxuatkho')->where('phieuxuatkho_id',$id)->get();
        $congtrinh = CongTrinh::all();
        return view('phieuxuatkho.sua', ['xuatkho' => $xuatkho, 'congtrinh' => $congtrinh,'chitiet'=>$chitiet]);
    }

    public function postSua(Request $request, $id)
    {
        $pxk = PhieuXuatKho::find($id);
        $this->validate($request,
            [
                'txtLyDo' => 'required|min:5|max:100'
            ],
            [
                'txtLyDo.required' => 'Chưa nhập lý do xuất',
                'txtLyDo.min' => 'Lý do nhập có phải có ít nhất 5 ký tự',
                'txtLyDo.max' => 'Lý do nhập có tối đa 100 ký tự'
            ]
        );
        $pxk->xk_lydo = $request->txtLyDo;
        $pxk->congtrinh_id = $request->state_id;
        $pxk->save();
        return redirect('qlkho/xuatkho/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function postXoa($id)
    {
        $pxk = PhieuXuatKho::find($id);
        try {
            $pxk->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/xuatkho/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/xuatkho/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function getXem(Request $request)
    {
        $id = $request->get('ID');
        $xuatkho = DB::table('phieuxuatkho')->where('id',$id)->first();
        $chitiet = ChiTietXuatKho::where('phieuxuatkho_id',$id)->get();
        foreach($chitiet as $xk)
        {
            $xk->vattu;
            $xk->kho;
        }
        $nv = DB::table('nhanvien')->where('id',$xuatkho->nv_id)->first();
        $ct = DB::table('congtrinh')->where('id',$xuatkho->congtrinh_id)->first();

        return response()->json([
            'xuatkho'=>$xuatkho,
            'chitiet'=>$chitiet,
            'nv'=>$nv,
            'ct'=>$ct,
            
            ]);
    }

    public function getPDF()
    {
        $xuatkho = PhieuXuatKho::all();
       
        // print_r($khachhang);
        $pdf = PDF::loadView('phieuxuatkho.phieu',compact('xuatkho'));
        return $pdf->stream();
    }

    public function getPhieuDon($id)
    {
        $xuatkho = DB::table('phieuxuatkho')->where('id',$id)->first();
        $chitiet = DB::table('chitietxuatkho')->where('phieuxuatkho_id',$id)->get();
        $nv = DB::table('nhanvien')->where('id',$xuatkho->nv_id)->first();
        $ct = DB::table('congtrinh')->where('id',$xuatkho->congtrinh_id)->first();
      
        $pdf = PDF::loadView('phieuxuatkho.phieudon',compact('xuatkho','chitiet','nv','ct'));
        return $pdf->stream();
    }
}
