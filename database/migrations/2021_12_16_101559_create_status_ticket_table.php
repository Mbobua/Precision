<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTicketTable extends Migration
{

    public function up()
    {
        Schema::create('status_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id');
            $table->foreignId('ticket_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('status_ticket');
    }
}
