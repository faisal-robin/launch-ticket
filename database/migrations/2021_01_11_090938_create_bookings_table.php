<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code', 100);
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('customer_name', 255);
            $table->string('booking_status', 20);
            $table->double('booking_tax_percent', 3, 2);
            $table->double('booking_tax_amount', 25, 2);
            $table->double('booking_discount_amount', 25, 2);
            $table->double('booking_sub_total', 25, 2);
            $table->double('booking_grand_total', 25, 2);
            $table->date('booking_date');
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
        Schema::dropIfExists('bookings');
    }
}
