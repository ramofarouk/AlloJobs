<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('cv')->nullable();
            $table->unsignedbigInteger('demandeur_id')->nullable();
            $table->foreign('demandeur_id')->references('id')->on('users');
            $table->unsignedbigInteger('entreprise_id')->nullable();
            $table->foreign('entreprise_id')->references('id')->on('users');
            $table->unsignedbigInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soumissions');
    }
};
