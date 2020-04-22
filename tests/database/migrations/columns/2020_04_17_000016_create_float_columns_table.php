<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloatColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('float_columns', function (Blueprint $table) {
            $table->float('float_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('float_columns');
    }
}
