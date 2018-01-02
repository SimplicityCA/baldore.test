<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

	public function consumer() {
        return $this->belongsTo('App\Consumer');
  }
  public function product() {
        return $this->belongsTo('App\Product');
  }

  public function draws() {
        return $this->hasMany('App\Draw');
  }

  protected $fillable = [
      'consumer_id', 'product_id', 'description', 'picture'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('description', 'like', '%' . $value . '%')
                  			->orWhereHas('consumer', function ($q) use ($value) {
                            $q->where('email','like','%'.$value.'%');
                        })
                        ->orWhereHas('product', function ($q) use ($value) {
                            $q->where('title','like','%'.$value.'%');
                        });
              }
          );
  }
}
