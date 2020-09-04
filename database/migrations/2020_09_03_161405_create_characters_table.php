<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo');
            $table->integer('healthPoints');
            $table->foreignId('owner_id')->onDelete('cascade')->constrained();
            $table->foreignId('race_id')->onDelete('cascade')->constrained();
            $table->foreignId('classe_id')->onDelete('cascade')->constrained();
            $table->foreignId('specialization_id')->onDelete('cascade')->constrained();
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
        Schema::dropIfExists('characters');
    }
}
