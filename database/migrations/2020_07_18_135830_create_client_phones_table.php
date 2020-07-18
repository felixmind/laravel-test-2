<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPhonesTable extends Migration
{
    public function up(): void
    {
        Schema::create('client_phones', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('client_id');
            $table->string('phone')->unique();
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
        Schema::dropIfExists('client_phones');
    }
}
