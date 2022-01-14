<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_entrepreneur')->nullable();
            $table->foreign('id_entrepreneur')->references('id')->on('entrepreneurs')->onDelete('set null');
            $table->string('name',100);
            $table->text('description');
            $table->string('venture_picture')->nullable();
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
        Schema::dropIfExists('ventures');
    }
}
