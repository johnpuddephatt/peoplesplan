<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('is_admin')->nullable();
            $table->integer('is_blocked')->default(0);
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->integer('login_count')->default(0);
        });

        DB::table('users')->insert(
          array(
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'name' => 'Admin',
            'is_admin' => '1'
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
        Schema::dropIfExists('users');
    }
}
