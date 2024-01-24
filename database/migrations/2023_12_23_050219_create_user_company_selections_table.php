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
        Schema::create('user_company_selections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_company_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('step_number');
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->string('interviewer')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_selections');
    }
};