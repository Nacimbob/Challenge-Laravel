<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->integer('from_node')->unsigned();
            $table->integer('to_node')->unsigned();
            $table->foreign('from_node')
            ->references('id')->on('nodes');
            $table->foreign('to_node')
            ->references('id')->on('nodes');
            $table->primary(['from_node', 'to_node']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
