<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaunchSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('launch_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('launch_id');
            $table->string('launch_name', 55);
            $table->bigInteger('terminal_from');
            $table->bigInteger('terminal_to');
            $table->date('schedule_date')->format('Y-m-d');
            $table->time('schedule_time');
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('launch_schedules');
    }
}
