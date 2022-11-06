<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice__details', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->integer('product_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->integer('quantity');
            $table->float('total_price');
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
        Schema::dropIfExists('invoice__details');
    }
}
