<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username',20);
            $table->string('password',100);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });

         // Insert some stuff
        DB::table('user')->insert(
            array(
                'user_id' => 1,
                'username' => 'sysadmin',
                'password' => md5('sysadmin'),
                'created_at' => date('Y-m-d H:i:s')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
