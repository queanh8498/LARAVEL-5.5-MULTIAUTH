<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    const     CREATED_AT    = 'tt_ngaytaomoi';
    const     UPDATED_AT    = 'tt_ngaycapnhat';
    protected $table        = 'thanhtoan';
    protected $fillable     = ['tt_ten', 'tt_thongtin', 'tt_ngaytaomoi', 'tt_ngaycapnhat', 'tt_trangthai'];
    protected $guarded      = ['tt_id'];
    protected $primaryKey   = 'tt_id';
    protected $dates        = ['tt_ngaytaomoi', 'tt_ngaycapnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
