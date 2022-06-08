<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->id('userId');
            $table->date('geboorteDatum')->nullable();
            $table->bigInteger('geslacht')->nullable();
            $table->bigInteger('userType')->nullable();
            $table->binary('profielFoto')->nullable();
            $table->text('userBio')->nullable();

            $table->foreign('userType')->references('userTypeId')->on('user_type');
            $table->foreign('geslacht')->references('geslachtId')->on('geslacht');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
};
