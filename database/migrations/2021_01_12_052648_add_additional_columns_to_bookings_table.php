<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('transaction_id')->after('booking_grand_total')->nullable();
            $table->string('currency')->after('transaction_id')->nullable();
            $table->string('phone')->after('currency')->nullable();
            $table->string('email')->after('phone')->nullable();
            $table->string('address')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
          $table->dropColumn('transaction_id');
          $table->dropColumn('currency');
          $table->dropColumn('phone');
        });
    }
}
