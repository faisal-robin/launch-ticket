<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $table = 'terminals';
    
    public function state() {
      return $this->belongsTo(State::class,"state_id");  
    }
    
}
