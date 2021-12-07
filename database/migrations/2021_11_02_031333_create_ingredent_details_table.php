<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredent_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ingredent_id')->unsigned();
            $table->foreign('ingredent_id')->references('ingredent_id')->on('ingredents')->onDelete('cascade');
            $table->string('ingredent_name');
            $table->bigInteger('price_id')->unsigned()->nullable();
            $table->foreign('price_id')->references('price_id')->on('prices')->onDelete('cascade');
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->date('date_add')->nullable();
            $table->date('date_exp')->nullable();
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
        Schema::dropIfExists('ingredent_details');
    }
}
