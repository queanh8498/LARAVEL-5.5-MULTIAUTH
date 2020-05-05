<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatlieu extends Model
{
    public $incrementing = false; //id không đc tự tăng vì đã có khóa chính 

    protected $table        = 'chatlieu';
    protected $fillable     = ['cl_ten'];

    protected $guarded      = ['cl_id'];
    protected $primaryKey   = 'cl_id';
}
