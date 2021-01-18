<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'created_at' => 'date'
  ];

  /**
   * Mutador para encriptar la contraseña
   * Definir o modificar la contraseña antes de
   * guardarla en el base de datos
   */
  public function setPasswordAttribute($input)
  {
    if ($input) {
      $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
  }

  public static function search($query)
  {
    return empty($query) ? static::query()
        : static::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
  }
}
