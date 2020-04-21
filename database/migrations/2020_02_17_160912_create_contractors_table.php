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

            $table->string('date')->nullable();
            $table->string('contractor_number')->nullable();
            $table->string('item')->nullable();

            $table->string('seller_name')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('lc_opener_name')->nullable();

            $table->string('fcls')->nullable();
            $table->string('lsd')->nullable();
            $table->string('lc_type')->nullable();
            $table->string('lc_number')->nullable();


            $table->string('price_per_dollar')->nullable();
            $table->string('qty')->nullable();
            $table->string('total_amount')->nullable();


            $table->string('commission_type')->nullable();
            $table->string('kg')->nullable();
            $table->string('percent')->nullable();
            $table->string('commission_amount')->nullable();

            $table->string('invoice_number')->nullable();
            $table->string('bl_number')->nullable();
            $table->text('invoice_details')->nullable();

            $table->string('etd')->nullable();
            $table->string('eta')->nullable();
            
            $table->string('awb')->nullable();
            $table->string('document')->nullable();
            $table->string('shipment_status')->nullable(); 


            $table->string('comm_deadline')->nullable();
            $table->string('status')->nullable();


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
