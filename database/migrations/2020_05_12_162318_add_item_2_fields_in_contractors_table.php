<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItem2FieldsInContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contractors', function (Blueprint $table) {
            $table->string('item_2')->after('total_amount')->nullable();
            $table->string('item_2_fcls')->after('item_2')->nullable();
            $table->string('item_2_price_per_dollar')->after('item_2_fcls')->nullable();
            $table->string('item_2_qty')->after('item_2_price_per_dollar')->nullable();
            $table->string('item_2_total_amount')->after('item_2_qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractors', function (Blueprint $table) {
            $table->dropColumn('item_2');
            $table->dropColumn('item_2_fcls');
            $table->dropColumn('item_2_price_per_dollar');
            $table->dropColumn('item_2_qty');
            $table->dropColumn('item_2_total_amount');
        });
    }
}
