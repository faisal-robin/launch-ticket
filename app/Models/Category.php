<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    
    public function rooms() {
        return $this->hasMany(Room::class, 'main_category');
    }
    
    
    public function subcategory() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
