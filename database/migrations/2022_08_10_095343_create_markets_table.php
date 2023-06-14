<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->longText('address');
            $table->string('longitude');
            $table->string('latitude');
            $table->integer('phone');
            $table->integer('mobile');
            $table->longText('information');
            $table->double('admin_commision');
            $table->double('delivery_fee');
            $table->double('delivery_range');
            $table->double('default_tax');
            $table->string('close');
            $table->string('active');
            $table->string('available_for_delivery');
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
        Schema::dropIfExists('markets');
    }
}
