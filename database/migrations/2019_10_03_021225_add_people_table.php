<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeopleTable extends Migration
{
    public function up(): void
    {
        Schema::create('people', function(Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->json('emails');
            $table->json('data');
            $table->timestamps();
            $table->ipAddress('request_ip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('people');
    }
}
