<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('personal_cit', function (Blueprint $table) {
            $table->id(); // Agrega un ID autoincremental
            $table->string('CIT', 100)->nullable();
            $table->string('TIPO_PRESTA_ECONMICA', 100)->nullable();
            $table->date('F_INICIO')->nullable();
            $table->date('F_FIN')->nullable();
            $table->string('COL_MED', 100)->nullable();
            $table->string('EXPEDIENTE', 100)->nullable();
            $table->char('DNI', 8)->nullable();
            $table->text('INFORME')->nullable();
            $table->timestamps();

            $table->foreign('DNI')->references('DNI')->on('personal')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('personal_cit');
    }
};

