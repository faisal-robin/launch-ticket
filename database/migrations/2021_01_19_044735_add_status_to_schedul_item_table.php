<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSchedulItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('launch_schedule_item', function (Blueprint $table) {
            $table->string('status')->after('room_id')->default('AVAILABLE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('launch_schedule_item', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
