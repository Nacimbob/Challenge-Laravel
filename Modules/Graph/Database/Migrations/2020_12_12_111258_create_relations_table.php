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

            $table->bigInteger('from_node')->unsigned();
            $table->bigInteger('to_node')->unsigned();
            $table->bigInteger('graph_id')->unsigned();
            $table->foreign('graph_id')
            ->references('id')->on('graphs')
            ->constrained()
            ->onDelete('cascade');
            $table->foreign('from_node')
            ->references('id')->on('nodes')
            ->constrained()
            ->onDelete('cascade');
            $table->foreign('to_node')
            ->references('id')->on('nodes')
            ->constrained()
            ->onDelete('cascade');
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
