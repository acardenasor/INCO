<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentsEtoI extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentsEtoI', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_match')->nullable();
            $table->foreign('id_match')->references('id')->on('coincidences')->onDelete('set null');
            $table->unsignedBigInteger('id_sender')->nullable();
            $table->foreign('id_sender')->references('id')->on('entrepreneurs')->onDelete('set null');
            $table->unsignedBigInteger('id_receiver')->nullable();
            $table->foreign('id_receiver')->references('id')->on('influencers')->onDelete('set null');
            $table->text('comment');
            $table->integer('score');
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
        Schema::dropIfExists('commentsEtoI');
    }
}
