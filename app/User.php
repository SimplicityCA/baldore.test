<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('name', 'like', '%' . $value . '%')
                        ->orwhere('email', 'like', '%' . $value . '%');
              }
          );
  }
}
