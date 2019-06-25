<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDestaqueTableArtigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('artigos', function (Blueprint $table) {
          $table->enum('destaque', ['N','S'])->default('N');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('artigos', function (Blueprint $table) {
          $table->dropColumn('destaque');
      });
    }
}
