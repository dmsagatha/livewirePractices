<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
  use HasFactory;

  protected $fillable = [
    'title', 'created_by', 'updated_by',
  ];

  /**
   * Este es el modelo Observer que ayuda a realizar las mismas acciones automáticamente al crear o actualizar modelos.
   *
   * @var array
   */
  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $model->created_by = Auth::id();
      $model->updated_by = Auth::id();
    });

    static::updating(function ($model) {
      $model->updated_by = Auth::id();
    });
  }
}
