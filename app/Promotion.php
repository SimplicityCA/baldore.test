<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
  protected $fillable = [
      'title', 'body', 'picture'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('title', 'like', '%' . $value . '%');
              }
          );
  }
}
