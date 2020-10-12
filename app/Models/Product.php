<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'model_no',
        'brand'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function price() {
        return $this->hasOne('App\Models\Price', 'product_id', 'id');
    }

    public function sellers() {
        return $this->hasMany('App\Models\Seller', 'product_id', 'id');
    }
}
