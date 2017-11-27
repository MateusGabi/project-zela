<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('log');

        Schema::create('log', function (Blueprint $table) {
            $table->bigIncrements('log_id');
            $table->string('category', 255);
            $table->string('message', 2000);
            $table->string('source', 255);
            $table->timestamp('created_at');

            //opcional na aplicação real
            $table->string('filename', 255);
            $table->bigInteger('line');
            $table->string('severity', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
