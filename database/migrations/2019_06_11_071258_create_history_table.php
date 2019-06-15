<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('ontlener_id')->default(null);
            $table->tinyInteger('renting')->default(null);/*true or false*/
            $table->string('titel');
            $table->string('auteur');
            $table->string('isbn');
            $table->string('jaartal');
            $table->string('editie');
            $table->string('desc');
            $table->string('photo');
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
        Schema::dropIfExists('history');

    }
}
