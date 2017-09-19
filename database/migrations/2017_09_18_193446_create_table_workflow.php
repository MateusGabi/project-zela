<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkflow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('workflow');

        Schema::create('workflow', function (Blueprint $table) {
            $table->increments('workflow_id');
            $table->string('workflow_name', 255);
            $table->integer('workflow_version')->unsigned()->default(1);
            $table->integer('worflow_created');

            $table->timestamps();

            $table->unique(['workflow_name', 'workflow_version']);
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
        Schema::dropIfExists('workflow');
    }
}
