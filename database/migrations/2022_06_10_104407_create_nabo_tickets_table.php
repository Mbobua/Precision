<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaboTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nabo_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('issue')->nullable();
            $table->string('attachment')->nullable();
            $table->longText('department_to');
            $table->longText('description');
            $table->string('agent_reason')->nullable();
            $table->foreignId('priority_id')->nullable();
            $table->foreignId('requester_id')->nullable();
            $table->foreignId('solver_id')->nullable();
            $table->foreignId('status_id')->nullable();
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
        Schema::dropIfExists('nabo_tickets');
    }
}
