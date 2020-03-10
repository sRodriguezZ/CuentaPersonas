<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
  protected $fillable = [
    'value_of_ultrasound', 'value_of_camera', 'totem_id',
  ];

  protected $hidden = [

  ];
}
