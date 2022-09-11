<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('title');
            $table->string('content');
            $table->timestamps();
        });

        Schema::create('note_props',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('notes_id');
            $table->mediumText('color');
            $table->foreign('notes_id')
            ->references('id')
            ->on('notes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
