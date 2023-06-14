<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('text');
            $table->string('button');
            $table->string('text_position');
            $table->string('text_color');
            $table->string('button_color');
            $table->string('background_color');
            $table->string('indicator_color');
            $table->binary('image');
            $table->string('image_fit');
            $table->integer('product_id');
            $table->integer('market_id');
            $table->string('enabled');
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
        Schema::dropIfExists('slides');
    }
}
