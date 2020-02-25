<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('date');
            $table->string('contractor_number');
            $table->string('count');

            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_country');

            $table->string('buyer_name');
            $table->string('buyer_address');
            $table->string('buyer_country');

            $table->string('lc_opener_name');
            $table->string('lc_opener_address');
            $table->string('lc_opener_country');

            $table->string('fcls');
            $table->string('price_per_kg');
            $table->string('kg');

            $table->string('total_amount');
            $table->string('lsd');
            $table->string('lc_type');
            $table->string('lc_number');

            $table->string('invoice_number');
            $table->string('bl_number');

            $table->string('etd');
            $table->string('etd_fcls');
            $table->string('etd_rest');

            $table->string('eta');
            $table->string('eta_fcls');
            $table->string('eta_rest');

            $table->string('awb');
            $table->string('document');

            $table->string('shipment_status');
            $table->string('commission');
            $table->string('commission_percentage');

            $table->string('comm_dd');
            $table->string('status');


            $table->softDeletes();
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
        Schema::dropIfExists('contractors');
    }
}
