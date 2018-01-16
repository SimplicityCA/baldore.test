<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  protected $fillable = [
      'title', 'body'
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
