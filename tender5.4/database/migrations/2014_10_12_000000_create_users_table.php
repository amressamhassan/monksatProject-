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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('Tphone')->nullable();
            $table->string('fax')->nullable();
            $table->integer('registration_id')->unsigned()->default('0');;
            $table->foreign('registration_id')->references('id')->on('registration')->onDelete('cascade');
            $table->integer('country_id')->unsigned()->default('1');
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
            $table->integer('users_type')->default('2');
            $table->integer('active')->default('0');
            $table->date('end_data');
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
