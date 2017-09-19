<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVariableHandler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('variable_handler');

        Schema::create('variable_handler', function (Blueprint $table) {
            $table->integer('workflow_id')->unsigned();
            $table->string('variable', 255);
            $table->string('class', 255);

            $table->timestamps();

            $table->foreign('workflow_id')->references('workflow_id')->on('workflow')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['workflow_id', 'class']);
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
        Schema::dropIfExists('variable_handler');
    }
}
