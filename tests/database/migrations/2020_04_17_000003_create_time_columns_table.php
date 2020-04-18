<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('time_columns', function (Blueprint $table) {
            $table->time('time');
            $table->timeTz('time_timezone');
            $table->timestamp('timestamp');
            $table->timestampTz('timestamp_timezone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('time_columns');
    }
}
