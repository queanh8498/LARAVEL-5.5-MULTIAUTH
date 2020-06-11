<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use App\chitietdonhang;
use App\sanpham;
use App\vanchuyen;
use App\khachhang;
use DB;
use Session;
use Carbon\Carbon;


class donhangController extends Controller
{
    public function show($id)
    {
        //
    }
    public function index()
    {
        $ds_donhang = DB::table('donhang')
                ->select('donhang.dh_id', 'khachhang.kh_id', 'khachhang.kh_email','donhang.dh_thoigiandathang',
                         'donhang.dh_diachi', 'donhang.dh_dienthoai', 'donhang.dh_dathanhtoan','donhang.dh_trangthai', 'donhang.dh_ngaylapphieugiao','donhang.dh_ngaytaomoi','vanchuyen.vc_chiphi',
                          DB::raw('SUM((chitietdonhang.ctdh_soluong * chitietdonhang.ctdh_dongia)+vanchuyen.vc_chiphi) as TongThanhTien'))
                ->join('vanchuyen', 
                       'vanchuyen.vc_id', '=', 'donhang.vc_id')
                 ->join('khachhang',
                        'donhang.kh_id', '=', 'khachhang.kh_id')
                ->join('chitietdonhang',
                       'donhang.dh_id', '=', 'chitietdonhang.dh_id')
                ->groupBy('donhang.dh_id', 'khachhang.kh_id','khachhang.kh_email', 'donhang.dh_thoigiandathang',
                          'donhang.dh_diachi', 'donhang.dh_dienthoai','donhang.dh_dathanhtoan', 'donhang.dh_trangthai','donhang.dh_ngaylapphieugiao', 'donhang.dh_ngaytaomoi','vanchuyen.vc_chiphi')
                ->paginate(5);
        //print_r($ds_donhang);
        return view('admin.donhang.index')->with('danhsachdonhang',$ds_donhang);
    }
     /**
     * Xử lý duyệt đơn hàng
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $dh = donhang::find($id);

        $dh->dh_dathanhtoan = 1; //1: đã thanh toán
        $dh->save();
        Session::flash('alert-success', 'Xử lý đơn hàng thành công');
        return redirect()->back();
    }

    public function print()
    {
        $ds_donhang = donhang::all();
        $ds_khachhang = khachhang::all();

        return view('donhang.print')
            ->with('danhsachdonhang', $ds_donhang)
            ->with('danhsachkhachhang', $ds_khachhang);
    }
    
}
