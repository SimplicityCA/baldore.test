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
}
