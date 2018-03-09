<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function type() {
        return $this->belongsTo('App\Type');
  }
  public function package() {
        return $this->belongsTo('App\Package');
  }

  public function recipes() {
        return $this->hasMany('App\Recipe');
  }

  public function pictures() {
        return $this->hasMany('App\Picture');
  }

  public function promotions() {
        return $this->hasMany('App\Promotion')->orderBy('valid_from', 'desc');
  }

  protected $fillable = [
      'type_id', 'package_id', 'title', 'description', 'grade', 'components', 'suggestion'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('title', 'like', '%' . $value . '%')
                  			->orWhereHas('package', function ($q) use ($value) {
                            $q->where('description','like','%'.$value.'%');
                        })
                        ->orWhereHas('type', function ($q) use ($value) {
                            $q->where('description','like','%'.$value.'%');
                        });
              }
          );
  }

  protected static function boot()
  {
      parent::boot();
      static::deleting(function ($product) {
        $pictures = $product->pictures()->get();
        foreach ($pictures as $picture)  {
          @unlink(public_path().'/img/products/'.$picture->description);
        }
        $product->pictures()->delete();
        $product->recipes()->delete();
      });
  }
}
