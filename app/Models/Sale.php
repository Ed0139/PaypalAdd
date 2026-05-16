<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $fillable = ['paypal_order_id', 'total', 'status'];

  public function items()
  {
    return $this->hasMany(SaleItem::class);
  }
}
