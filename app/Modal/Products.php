<?php

namespace App\Modal;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable=[
        'title_en', 'title_ar', 'description_en','description_ar','price','quantity'
    ];
}
