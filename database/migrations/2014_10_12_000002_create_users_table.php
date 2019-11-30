<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf', 14)->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('phone', 14)->nullable()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('street')->nullable();
            $table->integer('street_number')->nullable();
            $table->string('street_complement')->nullable()->nullable();
            $table->boolean('allow_notifications')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
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
