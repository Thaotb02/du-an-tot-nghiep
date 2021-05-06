<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('address')->nullable();
            $table->string('phone',11)->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('source');
            $table->string('code')->nullable();
            $table->time('time_code')->nullable();
            $table->integer('role');
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
        Schema::dropIfExists('infors');
    }
}
