<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('full_name')->nullable()->comment('Primer nombre, segundo nombre, primer apellido, segundo apellido');
      $table->string('dni')->nullable()->comment('Cédula de identidad');
      $table->string('nacionality')->nullable()->comment('Nacionalidad');
      $table->date('date_of_birth')->nullable()->comment('Fecha de nacimiento');
      $table->text('address')->nullable()->comment('Dirección de habitación');
      $table->text('biography')->nullable()->comment('Biografía Personal');
      $table->enum('security_question',['color','mascota','lugar'])->nullable()->comment('Pregunta de seguridad');
      $table->string('security_answer')->nullable()->comment('Respuesta de seguridad');
      $table->timestamp('email_verified_at')->nullable()->comment('Fecha de verificación de correo');
      $table->string('email')->unique()->comment('Correo electrónico');
      $table->enum('role', ['publicador', 'user']); // Campo para el rol del usuario
      $table->string('password')->comment('Contraseña');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
