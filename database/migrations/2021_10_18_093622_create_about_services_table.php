<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_services', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->text('text1')->nullable();
            $table->string('title2')->nullable();
            $table->text('text2')->nullable();
            $table->string('title3')->nullable();
            $table->text('text3')->nullable();
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
        Schema::dropIfExists('about_services');
    }
}
