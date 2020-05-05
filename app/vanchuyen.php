<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vanchuyen extends Model
{
    const     CREATED_AT    = 'vc_ngaytaomoi';
    const     UPDATED_AT    = 'vc_ngaycapnhat';
    protected $table        = 'vanchuyen';
    protected $fillable     = ['vc_ten', 'vc_ngaytaomoi', 'vc_ngaycapnhat', 'vc_trangthai'];
    protected $guarded      = ['vc_id'];
    protected $primaryKey   = 'vc_id';
    protected $dates        = ['vc_ngaytaomoi', 'vc_ngaycapnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
