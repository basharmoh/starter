<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OfferScope;


class Offer extends Model
{
    protected $table = "offers";
    protected $fillable =['name_ar', 'photo', 'name_en', 'price', 'details_ar', 'details_en', 'created_at', 'updated_at', ];//هذا يضهر الاستعلامات
    protected $hidden = ['created_at','updated_at'];//هذا يخفي الاستعلامات
    // public $timestamps = false;//هذا يخلي الوقت قميه فاضهيه
}

