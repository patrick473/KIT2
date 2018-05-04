<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];

    public function survey() {
        return $this->belongsTo(Survey::class);
      }
   
      public function question() {
        return $this->belongsTo(Question::class);
      }
}
