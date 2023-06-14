<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucharmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucharmasters', function (Blueprint $table) {
            $table->id();
            $table->string('vouchar_name');
            $table->string('vouchar_prize');
            $table->date('vouchar_expiry');
            $table->string('vouchar_associated_mobile');
            $table->integer('quantity');
            $table->string('vouchar_status');
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
        Schema::dropIfExists('voucharmasters');
    }
}
