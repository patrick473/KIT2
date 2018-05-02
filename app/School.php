<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = array('name','level','email_domain');


    public function user(){

        return $this->belongsTo('User');
    }
}
