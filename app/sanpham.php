<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
   //public $incrementing = false;
    
    const     CREATED_AT    = 'sp_ngaytaomoi';
    const     UPDATED_AT    = 'sp_ngaycapnhat';

    protected $table        = 'sanpham';
    protected $fillable     = ['sp_ten', 'sp_giagoc', 'sp_giaban', 'sp_hinh','sp_thongtin','sp_ngaytaomoi','sp_ngaycapnhat','sp_trangthai','lsp_id','dvt_id','cl_id'];
    protected $guarded      = ['sp_id'];

    protected $primaryKey   = 'sp_id';
    
    protected $dates        = ['sp_ngaytaomoi', 'sp_ngaycapnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loaisanpham(){
        return $this->belongsTo('App\loaisanpham', 'lsp_id', 'lsp_id');
    }
    public function donvitinh(){
        return $this->belongsTo('App\donvitinh', 'dvt_id', 'dvt_id');
    }
    public function chatlieu(){
        return $this->belongsTo('App\chatlieu', 'cl_id', 'cl_id');
    }
    public function hinhanhlienquan(){
        return $this->hasMany('App\hinhanh', 'sp_id', 'sp_id');
    }
}
