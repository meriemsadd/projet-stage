<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();//existe toujours par defaut 
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string("profession");
            $table->foreignId('evenement_id')
            ->constrained('evenements')/*kayrbt jdwl dyl participants m3a jdwl dyl evenemts*/
            ->onDelete('cascade');/*cascade , ila mshna levenemtnt automatiquemenet ytms7o les participants*/
            $table->timestamps();/*pour cree et updateee */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
