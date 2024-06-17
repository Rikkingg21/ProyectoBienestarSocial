<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('personal', function (Blueprint $table) {
            $table->char('DNI', 8)->primary();
            $table->string('APENOM', 255)->nullable();
            $table->string('CARGO', 100)->nullable();
            $table->string('CENTRO_TRABAJO', 100)->nullable();
            $table->string('TIPO_SERVIDOR', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('personal');
    }
};

