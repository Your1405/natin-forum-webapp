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
        Schema::create('user', function (Blueprint $table) {
            $table->id('userId');
            $table->string('username', 24);
            $table->string('email', 64);
            $table->string('password', 64);
            $table->date('geboorteDatum');
            $table->bigInteger('geslacht');
            $table->bigInteger('richting');
            $table->char('klas', 12);
            $table->bigInteger('userType');
            $table->binary('profielFoto');
            $table->text('userBio');
            $table->timestamp('accountCreated');
            $table->bigInteger('accountStatus');
            $table->unique(['userId','username', 'email']);

            $table->foreign('geslacht')->references('geslachtId')->on('geslacht');
            $table->foreign('richting')->references('richtingId')->on('richting');
            $table->foreign('userType')->references('userTypeId')->on('user_type');
            $table->foreign('accountStatus')->references('accountStatusId')->on('account_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
