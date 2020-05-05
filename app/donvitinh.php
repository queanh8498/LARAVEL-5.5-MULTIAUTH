<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donvitinh extends Model
{
    public $incrementing = false; //id không đc tự tăng vì đã có khóa chính 

    protected $table        = 'donvitinh';
    protected $fillable     = ['dvt_ten'];

    protected $guarded      = ['dvt_id'];
    protected $primaryKey   = 'dvt_id';
}
