<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            # GENERAL
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->date('birthdate')->nullable();

            # AUTHENTICATION
            $table->string('email')->unique();
            $table->string('password')->nullable();

            # TRACKABLE
            $table->integer('signin_count')->default(0);
            $table->ipAddress('current_signin_ip')->nullable();
            $table->dateTime('current_signin_at')->nullable();
            $table->ipAddress('last_signin_ip')->nullable();
            $table->dateTime('last_signin_at')->nullable();

            # SYSTEM
            $table->string('slug')->index();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
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
