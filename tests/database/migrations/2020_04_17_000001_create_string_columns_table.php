<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStringColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('string_columns', function (Blueprint $table) {
            $table->string('string_column');
            $table->string('string_column_custom_length', 80);
            $table->string('string_column_custom_long_length', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('string_columns');
    }
}
