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
            $table->bigInteger('contractor_number');
            $table->timestamp('date');
            $table->string('port');
            $table->string('supplier');
            $table->string('etd');
            $table->string('eta');
            $table->string('buyer');
            $table->string('latest_shipment_date');
            $table->string('quantity');
            $table->string('price_per_kg');
            $table->string('total_amount');
            $table->string('containers');
            $table->string('lc_number');
            $table->string('invoice_number');
            $table->float('commission');
            $table->string('bl_number');
            $table->string('contractor_status');
            $table->string('documents');
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
