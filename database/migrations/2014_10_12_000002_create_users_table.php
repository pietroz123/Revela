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
            $table->string('cpf', 14)->unique();
            $table->date('birthday');
            $table->string('cellphone', 15);
            $table->string('phone', 14)->nullable();
            $table->bigInteger('city_id')->unsigned();
            $table->string('zip_code', 9);
            $table->string('neighborhood');
            $table->string('street');
            $table->integer('street_number');
            $table->string('street_complement')->nullable();
            $table->boolean('allow_notifications');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
