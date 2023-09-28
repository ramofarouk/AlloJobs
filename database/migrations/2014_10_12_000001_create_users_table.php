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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenoms')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('pseudo')->nullable();
            $table->text('description')->nullable();
            $table->string('quartier')->nullable();
            $table->string('activite')->nullable();
            $table->string('password')->nullable();
            $table->string('cv')->nullable();
            $table->string('last_diplome')->nullable();
            $table->string('last_experience')->nullable();
            $table->string('job')->nullable();
            $table->string('date_debut')->nullable();
            $table->string('password_visible')->nullable();
            $table->string('ville')->nullable();
            $table->string('profession')->nullable();
            $table->string('token')->nullable();
            $table->date('date_naissance')->nullable();
            $table->double('solde')->default(0.0);
            $table->string('sexe')->nullable();
            $table->string('avatar')->nullable();
            $table->string('code')->nullable();
            $table->string('otp')->nullable();
            $table->unsignedBigInteger('type_user')->default(1); // 1:Client || 2:Entreprise
            $table->unsignedBigInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
