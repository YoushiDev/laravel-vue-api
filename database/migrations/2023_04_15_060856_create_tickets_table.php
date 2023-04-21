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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->longText('slug')->unique();
            $table->longText('content');
            $table->longText('html');
            $table->string('url');
            $table->unsignedBigInteger('status_id')->index();
            $table->unsignedBigInteger('priority_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('agent_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->dateTime('completed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
