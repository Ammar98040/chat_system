<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chat_member_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversion_id')->constrained('chat_member_conversions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sender_id')->constrained('members')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('message');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_member_messages');
    }
};
