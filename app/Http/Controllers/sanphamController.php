<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sanpham;
use App\loaisanpham;
use App\hinhanh;
use App\chatlieu;
use App\donvitinh;
use Session;
use Storage;


class sanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_sanpham=sanpham::paginate(5);
        return view('admin.sanpham.index')->with('danhsachsanpham',$ds_sanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_loai=loaisanpham::all();
        $ds_cl = chatlieu::all();
        $ds_dv = donvitinh::all();

        return view('admin.sanpham.create')
        ->with('danhsachloai', $ds_loai)
        ->with('danhsachdonvi', $ds_dv)
        ->with('danhsachchatlieu', $ds_cl);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            'sp_hinhanhlienquan.*' => 'file|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);
        $sp = new sanpham();
       // $sp->sp_id=$request->sp_id;
        $sp->sp_ten=$request->sp_ten;
        $sp->sp_giagoc=$request->sp_giagoc;
        $sp->sp_giaban=$request->sp_giaban;
        $sp->sp_thongtin=$request->sp_thongtin;
        $sp->sp_trangthai=$request->sp_trangthai;
        $sp->lsp_id =$request->lsp_id;
        $sp->cl_id =$request->cl_id;
        $sp->dvt_id =$request->dvt_id;
       
        if($request->hasFile('sp_hinh'))
        {
            $file = $request->sp_hinh;
            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        $sp->save();
        //Lưu hình ảnh liên quan
        if($request->hasFile('sp_hinhanhlienquan')) {
            $files = $request->sp_hinhanhlienquan;
            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());
                // Tạo đối tưọng hinhanh
                $hinhanh = new hinhanh();
                $hinhanh->sp_id = $sp->sp_id;
                $hinhanh->ha_stt = ($index + 1);
                $hinhanh->ha_ten = $file->getClientOriginalName();
                $hinhanh->save();
            }
        }
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('danhsachsanpham.index');
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
        $sp = sanpham::where("sp_id", $id)->first();
        $ds_loai = loaisanpham::all();
        $ds_cl = chatlieu::all();
        $ds_dv = donvitinh::all();

        return view('admin.sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai)
            ->with('danhsachchatlieu', $ds_cl)
            ->with('danhsachdonvi', $ds_dv);
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
        $validation = $request->validate([
            'sp_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            'sp_hinhanhlienquan.*' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $sp = sanpham::where("sp_id",  $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giagoc = $request->sp_giagoc;
        $sp->sp_giaban = $request->sp_giaban;
        $sp->sp_thongtin = $request->sp_thongtin;
        $sp->sp_trangthai = $request->sp_trangthai;
        $sp->lsp_id = $request->lsp_id;
        $sp->cl_id =$request->cl_id;

        if($request->hasFile('sp_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->sp_hinh;
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        // Lưu hình ảnh liên quan
        if($request->hasFile('sp_hinhanhlienquan')) {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach($sp->hinhanhlienquan()->get() as $hinhanh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhanh->ha_ten);
                // Xóa record
                $hinhanh->delete();
            }
            $files = $request->sp_hinhanhlienquan;
            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());
                // Tạo đối tưọng HinhAnh
                $hinhanh = new hinhanh();
                $hinhanh->sp_id = $sp->sp_id;
                $hinhanh->ha_stt = ($index + 1);
                $hinhanh->ha_ten = $file->getClientOriginalName();
                $hinhanh->save();
            }
        }
        $sp->save();
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('danhsachsanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = sanpham::where("sp_id",  $id)->first();
        if(empty($sp) == false)
        {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach($sp->hinhanhlienquan()->get() as $hinhanh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhanh->ha_ten);
                // Xóa record
                $hinhanh->delete();
            }
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();
        Session::flash('alert-info', 'Xóa sản phẩm thành công');
        return redirect()->route('danhsachsanpham.index');
    }
    /**
     * Action hiển thị biểu mẫu xem trước khi in trên Web
     */
    public function print()
    {
        $ds_sanpham = sanpham::all();
        $ds_loai    = loaisanpham::all();
        return view('sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
    }
}
