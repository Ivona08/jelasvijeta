<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Languages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->timestamps();
        });

        Schema::create('language_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['language_id','locale']);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Languages');
    }
}
