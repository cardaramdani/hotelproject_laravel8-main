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
            $table->string('last_name')->nullable();
            $table->string('addres')->nullable();
            $table->integer('nik')->unique()->nullable();
            $table->string('negara')->nullable();
            $table->string('agama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->integer('no_ktp')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('kelamin')->nullable();
            $table->integer('npwp')->unique()->nullable();
            $table->integer('bpjstk')->unique()->nullable();
            $table->integer('bpjskes')->unique()->nullable();
            $table->string('join_date')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('status')->nullable();
            // $table->string('role_name')->nullable();
            $table->string('api_token')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
