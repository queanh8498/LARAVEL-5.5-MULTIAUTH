<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    const     CREATED_AT    = 'kh_ngaytaomoi';
    public    $timestamps   = false; //created_at

    protected $table        = 'khachhang';
    protected $fillable     = ['kh_hoten', 'kh_gioitinh', 'kh_email', 'kh_diachi', 'kh_dienthoai', 'kh_ngaytaomoi', 'kh_trangthai'];
    protected $guarded      = ['kh_id'];

    protected $primaryKey   = 'kh_id';

    protected $dates        = ['kh_ngaytaomoi'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function donhang(){
        return $this->hasMany('App\donhang', 'kh_id', 'kh_id');
    }
    
}
