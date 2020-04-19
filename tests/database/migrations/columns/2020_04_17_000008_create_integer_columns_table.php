<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegerColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('integer_columns', function (Blueprint $table) {
            $table->integer('integer_column');
            $table->bigInteger('biginteger_column');
            $table->mediumInteger('mediuminteger_column');
            $table->smallInteger('smallinteger_column');
            $table->tinyInteger('tinyinteger_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('integer_columns');
    }
}
