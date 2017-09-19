<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExecutionState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('execution_state');

        Schema::create('execution_state', function (Blueprint $table) {
            $table->integer('execution_id')->unsigned();
            $table->integer('node_id')->unsigned();
            $table->binary('node_state')->nullable();
            $table->binary('node_activated_from')->nullable();
            $table->integer('node_thread_id')->unsigned();

            $table->timestamps();

            $table->foreign('execution_id')->references('execution_id')->on('execution')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('node_id')->references('node_id')->on('node')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['execution_id', 'node_id']);
            $table->engine = "InooDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('execution_state');
    }
}
