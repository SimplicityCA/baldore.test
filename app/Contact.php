<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = [
      'name', 'lastname', 'email'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('name', 'like', '%' . $value . '%')
                        ->orwhere('lastname', 'like', '%' . $value . '%')
                        ->orwhere('email', 'like', '%' . $value . '%');
              }
          );
  }
}
