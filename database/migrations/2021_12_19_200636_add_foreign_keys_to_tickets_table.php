<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->bigInteger('requester_id')->unsigned();
            $table->foreign('requester_id')->references('id')->on('users');

            $table->bigInteger('delegatee_id')->unsigned()->nullable();
            $table->foreign('delegatee_id')->references('id')->on('users');

            $table->bigInteger('solver_id')->unsigned()->nullable();
            $table->foreign('solver_id')->references('id')->on('users');

            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
}
