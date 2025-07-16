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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('lieu');
            $table->date('date_de_début');
            $table->date('date_de_fin');
            $table->time('heure');
            $table->text('description');
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->unsignedBigInteger('type_events_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('type_events_id')->references('id')->on('type_events')->onDelete('cascade');
            $table->string('image')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
