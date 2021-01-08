<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = ['order_number', 'customer_name', 'customer_email'];

  public function products()
  {
    return $this->belongsToMany(Product::class);
  }
}
