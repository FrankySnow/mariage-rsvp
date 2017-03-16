<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id');
            
            $table->engine = 'InnoDB';

            $table->string('presence');
        });

        Schema::create('reponses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('remarque')->nullable();
            $table->string('email')->nullable();
            $table->integer('presence_id')->unsigned()->nullable();
            $table->integer('famille_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('presence_id')
                  ->references('id')->on('presences')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('famille_id')
                  ->references('id')->on('familles')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reponses');
        Schema::dropIfExists('presences');
    }
}
