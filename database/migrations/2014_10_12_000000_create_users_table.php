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
            $table->string('fname');
            $table->string('lname');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('phone');
            $table->string('countryCode');
            $table->string('code')->nullable();
            //chick correct code
            $table->boolean('active')->default(0);

            $table->string('rememberToken')->nullable();
            $table->text('remember_token')->nullable();

            $table->string('gender');

            //Package Type
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('user_packages');
            //Account State Active "1"& disable "0"
            $table->integer('state');

            $table->date('endDateSubscripe')->nullable();

            $table->string('image');

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
