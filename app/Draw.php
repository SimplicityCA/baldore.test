<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{

	public function recipe() {
        return $this->belongsTo('App\Recipe');
  }

  protected $fillable = [
      'recipe_id'
  ];

  public function scopeSearch($query, $value)
	  {
	      return $query
	          ->where(
	              function($query) use ($value){
	                  $query->orWhereHas('recipe', function ($q) use ($value) {
                                        $q->where('title','like','%'.$value.'%');
                                    });
	              }
	          );
	  }
}
