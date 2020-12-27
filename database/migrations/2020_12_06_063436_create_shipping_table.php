<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('shipping', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->bigInteger('country_id');
            $table->text('country_name')->nullable();
            $table->integer('state_id');
            $table->text('state_name')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('shipping');
    }

}
