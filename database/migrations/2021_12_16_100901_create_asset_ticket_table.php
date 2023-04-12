<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetTicketTable extends Migration
{

    public function up()
    {
        Schema::create('asset_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->foreignId('ticket_id');
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
        Schema::dropIfExists('asset_ticket');
    }
}
