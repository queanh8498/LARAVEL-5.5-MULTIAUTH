<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\loaisanpham;
use App\Admin;
use Session;

class loaisanphamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function show(){}

    public function index()
    {
        $ds_loai=loaisanpham::paginate(5);

        return view('admin.loaisanpham.index')
        ->with('danhsachloai', $ds_loai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_loai=loaisanpham::all();
        return view('admin.loaisanpham.create')->with('danhsachloai', $ds_loai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$messages = [];

        $validation = $request->validate([
            'lsp_ten' => 'unique:loaisanpham'
        ]);

        $lsp=new loaisanpham();
        $lsp->lsp_id = $request->lsp_id;
        $lsp->lsp_ten = $request->lsp_ten;
        $lsp->lsp_ngaytaomoi = $request->lsp_ngaytaomoi;
        $lsp->lsp_trangthai = $request->lsp_trangthai;

        $lsp->save();

        Session::flash('alert-success','Create successfully');

        return redirect()->route('danhsachloai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ds_loai =loaisanpham::where("lsp_id", $id)->first();

        return view('admin.loaisanpham.edit')->with('l', $ds_loai);
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
        $l = loaisanpham::where('lsp_id', $id)->first();

        $l->lsp_id = $request->lsp_id;
        $l->lsp_ten = $request->lsp_ten;
        $l->lsp_trangthai = $request->lsp_trangthai;

        $l->save();

        Session::flash('alert-info','Cập nhật thành công !');
        return redirect()->route('danhsachloai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = loaisanpham::where("lsp_id",  $id)->first();
    
        $l->delete();

        Session::flash('alert-info', 'Xóa thành công');
        return redirect()->route('danhsachloai.index');
    }
}
