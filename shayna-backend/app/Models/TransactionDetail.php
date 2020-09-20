<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1. menambahkan doftdelets
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transacions_id', 'products_id'
    ];

    protected $hidden = [
    ];

    // relasi dengan transactions_id
    public function transaction(){
        return $this->belongsTo(Transaction::class, "transactions_id", 'id');
    }

    // relasi dengan products_id
    public function product(){
        return $this->belongsTo(Product::class, "products_id", 'id');
    }
}
