<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TypePackages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TypePackage_name');
            $table->integer('catetoryPackage');
            $table->integer('subject_id');
            $table->double('price');
            $table->double('price_sale')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(1);
            $table->integer('security')->nullable();
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
        Schema::dropIfExists('TypePackages');
    }
}
