<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Coincidences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coincidences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_entrepreneur')->nullable();
            $table->foreign('id_entrepreneur')->references('id')->on('entrepreneurs')->onDelete('set null');
            $table->unsignedBigInteger('id_influencer')->nullable();
            $table->foreign('id_influencer')->references('id')->on('influencers')->onDelete('set null');
            $table->unsignedBigInteger('creator')->nullable();;
            $table->foreign('creator')->references('id')->on('roles')->onDelete('set null');
            $table->unsignedBigInteger('id_venture')->nullable();
            $table->foreign('id_venture')->references('id')->on('ventures')->onDelete('set null');
            $table->boolean('accepted')->nullable();
            $table->boolean('completed')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('graded')->nullable();
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
        Schema::dropIfExists('coincidences');
    }
}
