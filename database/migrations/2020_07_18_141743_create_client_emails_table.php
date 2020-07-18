<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEmailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('client_emails', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('client_id');
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_emails');
    }
}