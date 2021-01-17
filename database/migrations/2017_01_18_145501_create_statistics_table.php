<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{

    public function up(){
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('statistics');
    }
}
