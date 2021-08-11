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
            $table->foreignId('role_id')->nullable()->default(2)->constrained();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('verification_code')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->integer('is_verified')->nullable()->default(0);
            $table->integer('is_complete')->nullable()->default(0);
            $table->rememberToken();

            $table->index('role_id');
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
