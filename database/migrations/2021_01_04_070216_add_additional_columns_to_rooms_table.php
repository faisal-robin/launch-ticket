<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToRoomsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('rooms', function (Blueprint $table) {
            $table->double('sell_price',10,2)->after('room_no');
            $table->double('purchase_price',10,2)->after('sell_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('sell_price');
            $table->dropColumn('purchase_price');
        });
    }

}
