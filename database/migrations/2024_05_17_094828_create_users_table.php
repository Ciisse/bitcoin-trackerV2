<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('password');
            $table->decimal('balance', 15, 2)->default(0); // Assuming balance is a decimal with 2 decimal places
            $table->decimal('bitcoin', 15, 8)->default(0); // Assuming bitcoin balance with 8 decimal places
            $table->string('profilePicture')->nullable();
            $table->string('email')->unique();
            $table->boolean('sendMail')->default(false);
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
}
