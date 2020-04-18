<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsignedIntegerColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('unsigned_integer_columns', function (Blueprint $table) {
            $table->unsignedInteger('unsignedinteger_column');
            $table->unsignedBigInteger('unsignedbiginteger_column');
            $table->unsignedMediumInteger('unsignedmediuminteger_column');
            $table->unsignedSmallInteger('unsignedsmallinteger_column');
            $table->unsignedTinyInteger('unsignedtinyinteger_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('unsigned_integer_columns');
    }
}
