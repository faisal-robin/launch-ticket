<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('launches', function (Blueprint $table) {
            $table->id();
            $table->string('launch_name');
            $table->string('launch_price_range')->nullable();
            $table->string('launch_image')->nullable();
            $table->text('launch_description')->nullable();
            $table->string('launch_status')->default('ACTIVE');
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
        Schema::dropIfExists('launches');
    }
}
