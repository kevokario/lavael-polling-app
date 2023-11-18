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
        Schema::create('user_polls', function (Blueprint $table) {
            $table->id();
//            $table->integer('user');
//            $table->integer('poll_question');
//            $table->integer('poll_question_option');

            $table->foreignId('user')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('poll_questions')
                ->references('id')
                ->on('poll_questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('poll_question_options')
                ->references('id')
                ->on('poll_question_options')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_polls');
    }
};
