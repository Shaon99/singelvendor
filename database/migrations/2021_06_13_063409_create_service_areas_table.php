<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_areas', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->string('text1')->nullable();
            $table->string('title2')->nullable();
            $table->string('text2')->nullable();
            $table->string('title3')->nullable();
            $table->string('text3')->nullable();
            $table->string('title4')->nullable();
            $table->string('text4')->nullable();
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
        Schema::dropIfExists('service_areas');
    }
}
