<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoneycombsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      if (Schema::hasTable("honeycombs_users"))
        return;

      Schema::create('honeycombs_users', function (Blueprint $table) {
        $table->increments("id");
        $table->string("name");
        $table->string("password");
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
        //
    }
}
