<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->unique();
            $table->string('slug',255)->unique();
            $table->string('theloai_id');
            $table->string('tacgia',255);
            $table->integer('decu');
            $table->longText('content');
            $table->integer('view')->nullable();
            $table->string('image');
            $table->integer('active');
            $table->timestamps();
            $table->string('hashtag',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen');
    }
}
