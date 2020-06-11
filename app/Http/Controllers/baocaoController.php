<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\loaisanpham; 
use App\sanpham;
use App\vanchuyen;
use App\khachhang;
use App\donhang;

class baocaoController extends Controller
    {
        /**
         * Action hiển thị view Báo cáo đơn hàng
         */
    public function donhang()
    {
        // $nhacungcap_count = NhaCungCap::count();
        $loaisanpham_count = loaisanpham::count();
        $sanpham_count = sanpham::count();
        $vanchuyen_count = vanchuyen::count();
        $khachhang_count = khachhang::count();
        $donhang_count = donhang::count();
        return view('admin.reports.donhang', compact('loaisanpham_count', 'sanpham_count', 'vanchuyen_count', 'khachhang_count', 'donhang_count'));        }
    /**
 * Action AJAX get data cho báo cáo Đơn hàng
 */
    public function donhangData(Request $request)
    {
        $parameter = [
            'thang' => $request->thang,
        ];
         
        $data = DB::select('
            SELECT month(dh.dh_thoigiandathang) AS thoigian, SUM((ctdh.ctdh_soluong * ctdh.ctdh_dongia) + vc.vc_chiphi) as tongThanhTien
            FROM donhang dh
            JOIN vanchuyen vc ON vc.vc_id = dh.vc_id
            JOIN chitietdonhang ctdh ON dh.dh_id = ctdh.dh_id
            WHERE year(dh.dh_thoigiandathang) = :thang
            GROUP BY month(dh.dh_thoigiandathang)
        ', $parameter);
       // dd($parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }
}