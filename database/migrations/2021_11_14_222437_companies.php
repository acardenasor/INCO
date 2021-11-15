<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id_company');
            $table->unsignedBigInteger('id_entrepreneur')->nullable();
            $table->foreign('id_entrepreneur')->references('id_entrepreneur')->on('entrepreneurs')->onDelete('set null');
            $table->string('name',100);
            $table->text('description');
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->references('id_category')->on('categories')->onDelete('set null');
            $table->integer('nit');
            $table->string('address');
            $table->string('web_domain');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_number');
            $table->string('product_photos')->nullable();
            $table->string('company_logo')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
