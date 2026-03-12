<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('est_passagers', function (Blueprint $table) {
            $table->foreignId('employe_id')->constrained('employes');
            $table->foreignId('trajet_id')->constrained('trajets');
            $table->dateTime('date_inscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('est_passagers');
    }
};
