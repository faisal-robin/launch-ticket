<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToLaunchSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('launch_schedules', function (Blueprint $table) {
             $table->integer('from_state_id')->after('terminal_to');
             $table->integer('to_state_id')->after('from_state_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('launch_schedules', function (Blueprint $table) {
            Schema::dropIfExists('from_state_id');
            Schema::dropIfExists('to_state_id');
        });
    }
}
