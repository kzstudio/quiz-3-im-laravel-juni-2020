<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow', function (Blueprint $table) {
            $table->bigIncrements('follow_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('follow_user_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('follow_user_id')->references('user_id')->on('user')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow');
    }
}
