<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  
    protected $fillable = ['title', 'type','survey_id','attributes'];
   
}
