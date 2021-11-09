<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportgoodsDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importgoods_drinks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('drink_id')->unsigned()->nullable();
            $table->foreign('drink_id')->references('drink_id')->on('drinks')->onDelete('cascade');
            $table->integer('amount_add');
            $table->date('date_add');
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
        Schema::dropIfExists('importgoods_drinks');
    }
}
