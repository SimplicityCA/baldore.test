<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  public function products() {
    return $this->hasMany('App\Product');
  }

	protected $fillable = [
      'description'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('description', 'like', '%' . $value . '%');
              }
          );
  }
}
