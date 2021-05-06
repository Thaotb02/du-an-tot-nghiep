<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('infor_id');
            $table->integer('salary')->nullable();
            $table->string('descriptions')->nullable();
            $table->integer('subject_id');  
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('Pts');
    }
}
