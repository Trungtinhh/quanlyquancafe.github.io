<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('drink_id')->unsigned();
            $table->foreign('drink_id')->references('drink_id')->on('drinks')->onDelete('cascade');
            $table->string('drink_name');
            $table->bigInteger('price_id')->unsigned();
            $table->foreign('price_id')->references('price_id')->on('prices')->onDelete('cascade');
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->date('date_add')->nullable();
            $table->date('date_exp')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('drink_details');
    }
}