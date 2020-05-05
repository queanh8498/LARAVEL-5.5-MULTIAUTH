<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    public $incrementing = false; //id không đc tự tăng vì đã có khóa chính 
    public $timestamps = false;
    
    const     CREATED_AT    = 'lsp_ngaytaomoi';
    protected $table        = 'loaisanpham';
    protected $fillable     = ['lsp_id','lsp_ten', 'lsp_ngaytaomoi', 'lsp_trangthai'];

    protected $guarded      = ['lsp_id'];
    protected $primaryKey   = 'lsp_id';
    protected $dates        = ['lsp_ngaytaomoi'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function sanpham(){
        return $this->hasMany('App\sanpham', 'lsp_id', 'lsp_id');
    }
}
