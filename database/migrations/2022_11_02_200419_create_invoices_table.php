<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->string('billing_first_name');
            $table->string('billing_email');
            $table->string('billing_company');
            $table->string('billing_phone');
            $table->string('billing_country_code');
            $table->string('billing_country_id');
            $table->longText('billing_address');
            $table->longText('order_comments');
            $table->float('coupon_discount', 8,2)->nullable();
            $table->float('after_coupon_discount', 8,2)->nullable();
            $table->float('delivery_change', 8,2);
            $table->float('total_price', 8,2);
            $table->string('payment_method');
            $table->string('payment')->default('Unpaid');
            $table->string('payment_status')->default('Processing');
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
        Schema::dropIfExists('invoices');
    }
}
