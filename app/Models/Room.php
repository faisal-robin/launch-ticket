<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    public function launch_info() {
        return $this->belongsTo(Launch::class, 'launch_id');
    }

}
