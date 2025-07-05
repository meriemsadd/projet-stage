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
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string("profession");
            $table->foreinId('evenement_id')->constrained('evenements')/*kayrbt jdwl dyl participants m3a jdwl dyl evenemts*/->onDelete('cascade');/*l id dyal levnet li bha y7drlo*/
            $table->timestamps();
        });
    }
    /*cascade , ila mshna levenemtnt automatiquemenet ytms7o les participants*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
