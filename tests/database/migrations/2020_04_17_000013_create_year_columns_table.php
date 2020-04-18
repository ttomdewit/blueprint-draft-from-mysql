<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearColumnsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('year_columns', function (Blueprint $table) {
            $table->year('year_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('year_columns');
    }
}
