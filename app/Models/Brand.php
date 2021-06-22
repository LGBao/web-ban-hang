<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // use HasFactory;

    public $timestamps=false;

    protected $fillable=['brand_name','brand_desc','brand_status'];
    protected $primaryKey='brand_id';
    protected $table='tbl_brand_product';
    // public function product()
    // {
    //     return $this->belongsTo('App\product','brand_id');
    // }

    //sử dụng hasMany: là có nhiều
    //sử dụng belongsTo: là chỉ thuộc 1 cái gì đó
}
