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
        Schema::create('publicadors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();
            $table->string('numero_colegiatura', 50)->nullable();
            $table->tinyInteger('verificado')->nullable();
            $table->string('enfermedades_tratadas', 45)->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->text('experiencia')->nullable();
            $table->text('formacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
