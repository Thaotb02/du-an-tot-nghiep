<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->integer('typePackage_id');
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->integer('discount_id')->nullable();
            $table->integer('pt_id')->nullable();
            $table->double('total_money');
            $table->integer('payment_method')->nullable();
            $table->integer('status_reserves')->nullable();
            $table->integer('status_pass ')->nullable();
            $table->integer('status')->default(1);
            $table->integer('pass')->nullable();
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
        Schema::dropIfExists('Orders');
    }
}
