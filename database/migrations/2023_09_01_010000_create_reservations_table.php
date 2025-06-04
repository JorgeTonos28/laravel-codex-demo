<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('department');
            $table->string('extension')->nullable();
            $table->unsignedInteger('people_count');
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->string('event_name');
            $table->string('public_type');
            $table->date('date');
            $table->time('time');
            $table->boolean('needs_janitor')->default(false);
            $table->boolean('is_canceled')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
