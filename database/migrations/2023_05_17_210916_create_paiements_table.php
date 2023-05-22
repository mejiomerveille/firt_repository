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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->date('date_paiement');
            $table->double('montant');
            $table->string('mode_paiement');
            $table->string('statut_paiement');
            $table->timestamps();

            $table->foreign('commande_id')->references('id')->on('commandes')->onDelate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
