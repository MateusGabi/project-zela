<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNodeConnection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('node_connection');

        Schema::create('node_connection', function (Blueprint $table) {
            $table->increments('node_connection_id');
            $table->integer('incoming_node_id')->unsigned();
            $table->integer('outcoming_node_id')->unsigned();

            $table->timestamps();

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
        Schema::dropIfExists('node_connection');
    }
}
