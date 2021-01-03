<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Launch extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'launches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //public $timestamps = false;

    public function launch_chedules()
    {
        return $this->hasMany('App\Models\LaunchSchedule');
    }
}
