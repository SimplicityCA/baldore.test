<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePicture extends Model
{
  protected $fillable = [
      'path', 'message1', 'message2','link'
  ];
}
