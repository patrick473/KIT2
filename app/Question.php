<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['title', 'type','survey_id','attributes'];
   
}
