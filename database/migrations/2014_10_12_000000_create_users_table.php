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
            $table->rememberToken();
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('patronymic')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->enum('gender', ['male', 'female']);
            $table->enum('language', ['ru', 'en'])->default('ru');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->text('thumbnail')->nullable();
            $table->date('birthday_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('type_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
