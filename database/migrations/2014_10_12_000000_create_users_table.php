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
            $table->string("nip")->unique();
            $table->string("name");
            $table->enum("gender", ['male', 'female'])->nullable();
            $table->string("phone_no")->unique()->nullable();
            $table->string("password");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum("level", ['admin', 'guru']);
            $table->string('image')->nullable();
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
}
