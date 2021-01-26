<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = [
    'title'
  ];

  public static function search($query)
  {
    return empty($query) ? static::query()
        : static::where('title', 'like', '%' . $query . '%')
            ->orWhere('id', 'like', '%' . $query . '%');
  }
}