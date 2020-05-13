<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitietdonhang';
    protected $fillable     = ['ctdh_soluong', 'ctdh_dongia'];
    protected $guarded      = ['dh_id', 'sp_id'];

    protected $primaryKey   = ['dh_id', 'sp_id'];
    public    $incrementing = false;

    public function sanpham(){
        return $this->belongsTo('App\sanpham', 'sp_id', 'sp_id');
    }
}
