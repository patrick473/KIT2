<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  public function Users()
  {
    return $this->belongsTo('App\User');
  }

  public function Groups()
  {
    return $this->belongsTo('\App\Group');
  }
}
