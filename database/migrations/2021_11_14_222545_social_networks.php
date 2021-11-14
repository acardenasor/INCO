<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialNetworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->bigIncrements('id_social_network');
            $table->unsignedBigInteger('id_influencer');
            $table->foreign('id_influencer')->references('id_influencer')->on('influencers');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tik_tok')->nullable();
            $table->string('kawai')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('twitch')->nullable();
            $table->string('reddit')->nullable();
            $table->string('weibo')->nullable();
            $table->string('bilibili')->nullable();
            $table->timestamp('started_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
}
