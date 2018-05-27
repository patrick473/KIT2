<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
    public function components() {
        return $this->hasMany(Pagecomponent::class);
      }
     
}
