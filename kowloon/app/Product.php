<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'technical_info'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function hotItems() {
        return $this->hasMany(HotItem::class);
    }

    public function productImages() {
        return $this->hasMany('App\Productimage');
    }
}
