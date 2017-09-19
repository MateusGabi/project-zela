<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('node');

        Schema::create('node', function (Blueprint $table) {
            $table->increments('node_id');
            $table->integer('workflow_id')->unsigned();
            $table->string('node_class', 255);
            $table->binary('node_configuration')->nullable();

            $table->timestamps();

            $table->foreign('workflow_id')->references('workflow_id')->on('workflow')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->index('workflow_id');
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
        Schema::dropIfExists('node');
    }
}
