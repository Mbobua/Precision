<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentTicketTable extends Migration
{

    public function up()
    {
        Schema::create('incident_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incidents_id');
            $table->foreignId('ticket_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('incident_ticket');
    }
}
