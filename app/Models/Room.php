<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {
    
    protected $table = 'rooms';

    public function launch_info() {
        return $this->belongsTo(Launch::class, 'launch_id');
    }

    public function room_images() {
        return $this->hasMany(RoomImage::class, 'room_id');
    }
    
    public function category_info() {
       return $this->belongsTo(Category::class, 'main_category');   
    }

}
