<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportgoodsIngredentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importgoods_ingredents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ingredent_id')->unsigned()->nullable();
            $table->foreign('ingredent_id')->references('ingredent_id')->on('ingredents')->onDelete('cascade');
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
        Schema::dropIfExists('importgoods_ingredents');
    }
}
