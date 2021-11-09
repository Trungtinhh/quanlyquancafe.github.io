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
            $table->bigInteger('drink_id')->unsigned()->nullable();
            $table->foreign('drink_id')->references('drink_id')->on('drinks')->onDelete('cascade');
            $table->bigInteger('ingredent_id')->unsigned()->nullable();
            $table->foreign('ingredent_id')->references('ingredent_id')->on('ingredents')->onDelete('cascade');
            $table->bigInteger('price_id')->unsigned()->nullable();
            $table->foreign('price_id')->references('price_id')->on('prices')->onDelete('cascade');
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('provider_id')->on('providers')->onDelete('cascade');
            $table->integer('amount');
            $table->date('date_add');
            $table->date('date_exp');
            $table->string('image')->nullable();
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
