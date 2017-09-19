<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExecution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('execution');

        Schema::create('execution', function (Blueprint $table) {
            $table->integer('workflow_id')->unsigned();
            $table->increments('execution_id')->unique();
            $table->integer('execution_parent')->unsigned()->nullable();
            $table->integer('execution_started');
            $table->integer('execution_suspended')->nullable();
            $table->binary('execution_variables')->nullable();
            $table->binary('execution_waiting_for')->nullable();
            $table->binary('execution_threads')->nullable();
            $table->integer('execution_next_thread_id')->unsigned();

            $table->timestamps();

            $table->index('execution_parent');
            $table->engine = "InooDB";
        });

        Schema::table('execution', function (Blueprint $table) {
            $table->dropPrimary('execution_id');

            $table->foreign('workflow_id')->references('workflow_id')->on('workflow')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('execution_parent')->references('execution_id')->on('execution')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['execution_id', 'workflow_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('execution');
    }
}
