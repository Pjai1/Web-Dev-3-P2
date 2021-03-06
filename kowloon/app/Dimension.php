<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
