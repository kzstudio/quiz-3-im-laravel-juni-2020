<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->bigIncrements('artikel_id');
            $table->string('judul',60);
            $table->string('isi',200);
            $table->string('slug',60);
            $table->string('tag',100);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
