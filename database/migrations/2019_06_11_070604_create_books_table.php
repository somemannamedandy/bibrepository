<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('rented_id')->default(0);
            $table->string('titel');
            $table->string('auteur');
            $table->string('isbn');
            $table->string('jaartal');
            $table->string('editie');
            $table->text('desc');
            $table->string('photo')->default('');
            $table->string('return_date')->default('');
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
        Schema::dropIfExists('books');
    }
}
