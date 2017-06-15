<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status',['pending','ongoing','completed']);
            $table->enum('priority',['high','medium','low']);
            $table->text('description');
            $table->string('remarks');
            $table->integer('assigned_to')->unsigned();
            $table->integer('assigned_by')->unsigned();
            $table->integer('s_did')->unsigned();
            $table->foreign('assigned_to')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('assigned_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('s_did')
                ->references('id')
                ->on('subdepartments')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
