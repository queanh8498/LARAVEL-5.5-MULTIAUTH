<?php
namespace App\Http\Controllers;
use Auth;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\loaisanpham; 
use App\sanpham;
use App\vanchuyen;
use App\khachhang;
use App\donhang;
use App\thanhtoan;
use App\chitietdonhang;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\ContactMailer;
use App\Mail\OrderMailer;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
         $ds_top3_newest_loaisanpham = DB::table('loaisanpham')
             ->join('sanpham', 'loaisanpham.lsp_id', '=', 'sanpham.lsp_id')
             ->orderBy('lsp_ngaytaomoi')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);
         //$danhsachsanpham = sanpham::all();

         // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
         $danhsachhinhanhlienquan = DB::table('hinhanh')
        ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())->get();
        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    private function searchSanPham(Request $request)
    {
        $query = DB::table('sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        $searchByTen = $request->query('search-product');
        // if ($searchByLoaiMa != null) {

        // }
        if ($searchByTen != null) {
            $query->where('sp_ten','LIKE','%'.$searchByTen.'%');
        }
        $data = $query->get();
        return $data;
    }
    public function product(Request $request)
    {
        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())
                                ->get();

        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.pages.product')
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    /**
     * Action hiển thị chi tiết Sản phẩm
     */
    public function productDetail(Request $request, $id)
    {
        $sanpham = sanpham::find($id);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->where("sp_id", $id)
                                ->get();

        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        return view('frontend.pages.product-detail')
            ->with('sp', $sanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
        /** * Action hiển thị view Liên hệ * GET /contact */ 
    public function contact()
    {
        return view('frontend.pages.contact');
    }
        /** 
     * Action gởi email với các lời nhắn nhận được từ khách hàng 
     * POST /lien-he/goi-loi-nhan 
     */ 
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('queanhst98@gmail.com')->send(new ContactMailer($input));
        return $input;
    }
    /**
     * Action hiển thị giỏ hàng
     */
    public function cart(Request $request)
    {
        // Query danh sách hình thức vận chuyển
        $danhsachvanchuyen = vanchuyen::all();
        // Query danh sách phương thức thanh toán
        $danhsachphuongthucthanhtoan = thanhtoan::all();

        return view('frontend.pages.shopping-cart')
            ->with('danhsachvanchuyen', $danhsachvanchuyen)
            ->with('danhsachphuongthucthanhtoan', $danhsachphuongthucthanhtoan);
    }
    public function order(Request $request)
    {
        // dd($request);
        // Data gởi mail
        $dataMail = [];
        try {
            // Tạo mới khách hàng
            $khachhang = new khachhang();
            $khachhang->kh_hoten = $request->khachhang['kh_hoten'];
            $khachhang->kh_gioitinh = $request->khachhang['kh_gioitinh'];
            $khachhang->kh_email = $request->khachhang['kh_email'];
            if(!empty($request->khachhang['kh_diachi'])) {
                $khachhang->kh_diachi = $request->khachhang['kh_diachi'];
            }
            if(!empty($request->khachhang['kh_dienthoai'])) {
                $khachhang->kh_dienthoai = $request->khachhang['kh_dienthoai'];
            }
            $khachhang->kh_trangthai = 2; // Khả dụng
            $khachhang->save();
            $dataMail['khachhang'] = $khachhang->toArray();
            // Tạo mới đơn hàng
            $donhang = new donhang();
            $donhang->kh_id = $khachhang->kh_id;
            $donhang->kh_email = $khachhang->kh_email;
            $donhang->dh_thoigiandathang = Carbon::now();
            $donhang->dh_diachi = $request->donhang['dh_diachi'];
            $donhang->dh_dienthoai = $request->donhang['dh_dienthoai'];
            $donhang->dh_dathanhtoan = 0; //Chưa thanh toán
           // $donhang->nd_giaohang = 1; //Mặc định nhân viên đầu tiên
            $donhang->dh_trangthai = 1; //Nhận đơn
            $donhang->vc_id = $request->donhang['vc_id'];
            $donhang->tt_id = $request->donhang['tt_id'];
            $donhang->save();
            $dataMail['donhang'] = $donhang->toArray();
            // Lưu chi tiết đơn hàng
            foreach($request->giohang['items'] as $sp)
            {
                $chitietdonhang = new chitietdonhang();
                $chitietdonhang->dh_id = $donhang->dh_id;
                $chitietdonhang->sp_id = $sp['_id'];
               
                $chitietdonhang->ctdh_soluong = $sp['_quantity'];
                $chitietdonhang->ctdh_dongia = $sp['_price'];
                $chitietdonhang->save();
                $dataMail['donhang']['chitiet'][] = $chitietdonhang->toArray();
                $dataMail['donhang']['giohang'][] = $sp;
            }
            // Gởi mail khách hàng
            // dd($dataMail);
            Mail::to($khachhang->kh_email)
                ->send(new OrderMailer($dataMail));
        }
        catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        } 
        catch(Exception $e) {
            throw $e;
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Tạo đơn hàng thành công!',
            'redirectUrl' => route('frontend.orderFinish')
        ));
    }
    /**
     * Action Hoàn tất Đặt hàng
     */
    public function orderFinish()
    {
        return view('frontend.pages.order-finish');
    }
    //them
    public function users()
    {   
        $users = User::getAllUsers();
        return view('frontend.layouts.partials.header', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
