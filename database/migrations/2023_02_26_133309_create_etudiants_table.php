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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('codeE');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse',100);
            $table->date('dateNaissance');
            $table->unsignedBigInteger('idclasse');
            $table->foreign('idclasse')->references('idc')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
