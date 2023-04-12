<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name')->nullable();
            $table->string('issue')->nullable();
            $table->string('attachment')->nullable();
            $table->string('subject');
            $table->longText('description');
            $table->string('priority')->nullable();
            $table->string('admin_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
