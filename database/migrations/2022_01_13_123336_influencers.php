<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Influencers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user')->unique()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->references('id')->on('categories')->onDelete('set null');
            $table->text('description');
            $table->string('photos')->nullable();
            $table->text('previous experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('influencers');
    }
}
