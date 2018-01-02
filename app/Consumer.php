<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    //

	public function recipes() {
        return $this->hasMany('App\Recipe');
  }

	protected $fillable = [
      'name', 'lastname', 'birthday', 'email', 'phone', 'identity_number'
  ];

  public function scopeSearch($query, $value)
  {
      return $query
          ->where(
              function($query) use ($value){
                  $query->orwhere('name', 'like', '%' . $value . '%')
                        ->orwhere('lastname', 'like', '%' . $value . '%')
                        ->orwhere('email', 'like', '%' . $value . '%')
                        ->orwhere('identity_number', 'like', '%' . $value . '%');
              }
          );
  }
}
