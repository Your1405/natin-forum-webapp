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
        Schema::create('post', function (Blueprint $table) {
            $table->id('postId');
            $table->string('postTitel', 256);
            $table->text('postBeschrijving');
            $table->bigInteger('postAuteur');
            $table->timestamp('postTijd');
            $table->timestamp('postUpdateTijd');
            $table->bigInteger('postCategorie');
            $table->char('postStatus');

            $table->foreign('postCategorie')->references('postCategoryId')->on('categorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
