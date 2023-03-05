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
        Schema::create('avis', function (Blueprint $table) {
            $table->unsignedBigInteger('ide');
            $table->unsignedBigInteger('idf');
            $table->primary(['idf','ide']);
            $table->integer('points');
            $table->foreign('idf')->references('idf')->on('formations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ide')->references('codeE')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
