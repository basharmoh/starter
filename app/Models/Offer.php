<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $fillable =['name', 'price', 'details','created_at','updated_at'];//هذا يضهر الاستعلامات
    protected $hidden = ['created_at','updated_at'];//هذا يخفي الاستعلامات
    // public $timestamps = false;//هذا يخلي الوقت قميه فاضهيه
}

