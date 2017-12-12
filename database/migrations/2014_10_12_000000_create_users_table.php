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
        $table->tinyInteger('is_admin')->nullable();
        $table->tinyInteger('is_blocked')->default(0);
        $table->string('provider')->nullable();
        $table->string('provider_id')->nullable();
        $table->string('avatar')->nullable();
        $table->tinyInteger('gravatar')->default(0);
        $table->tinyInteger('contactable')->default(1);
        $table->softDeletes();
        $table->integer('login_count')->default(0);
        $table->tinyInteger('verified')->default(0);
        $table->string('email_token')->nullable();
      });

      DB::table('users')->insert(
        array(
          'email' => env('ADMIN_EMAIL'),
          'password' => Hash::make(env('ADMIN_PASSWORD')),
          'name' => 'Admin',
          'is_admin' => '1',
          'verified' => '1',
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
