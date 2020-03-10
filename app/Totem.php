<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totem extends Model
{
  protected $fillable = [
    'number_of', 'floor', 'headquarter_id', 'ultrasound_id', 'camera_id', 'picture_id',
  ];

  protected $hidden = [

  ];
}
