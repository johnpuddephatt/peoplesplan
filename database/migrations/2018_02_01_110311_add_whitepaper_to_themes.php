<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWhitepaperToThemes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('themes', function (Blueprint $table) {
        $table->string('whitepaper_title')->nullable();
        $table->text('whitepaper_summary')->nullable();
        $table->text('whitepaper_body')->nullable();
        $table->string('whitepaper_file')->nullable();


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
