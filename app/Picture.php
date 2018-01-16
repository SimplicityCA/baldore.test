<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  public function product() {
        return $this->belongsTo('App\Product');
  }

  protected $fillable = [
      'product_id', 'description', 'name'
  ];

  protected static function boot()
    {
        parent::boot();
        static::deleting(function ($picture) {
          if ($picture->description)  @unlink(public_path().'/img/products/'.$picture->description);
        });
    }

    public function scopeSearch($query, $value)
	  {
	      return $query
	          ->where(
	              function($query) use ($value){
	                  $query->orwhere('name', 'like', '%' . $value . '%')
                          ->orWhereHas('product', function ($q) use ($value) {
                                        $q->where('title','like','%'.$value.'%');
                                    });
	              }
	          );
	  }
}
