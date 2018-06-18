<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class survey_group extends Model
{
    protected $table = 'surveys_group';
    protected $fillable = ['survey_id','group_id'];
}
