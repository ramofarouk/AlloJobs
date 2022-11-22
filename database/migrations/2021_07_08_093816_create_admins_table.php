<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('niveau');
            $table->string('token')->nullable();
            $table->integer('status')->default(1);     
            $table->rememberToken();
            $table->timestamps();
        });
        Admin::create([
            'email' => 'Komarf28@gmail.com',
            'niveau' => 2,
            'status' => 1,
            'token' => getRamdomText(20),
            'password' => bcrypt('r@dy@t1999')
        ]);

        Admin::create([
            'email' => 'admin@allobjobs.com',
            'niveau' => 2,
            'status' => 1,
            'token' => getRamdomText(20),
            'password' => bcrypt('allobjobs@2022')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
