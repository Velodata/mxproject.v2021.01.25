<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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
            $table->string('firstname', 30);
            $table->string('secondname', 30);
            $table->text('name', 50);
            // $table->string('email')->unique();
            $table->string('email', 50);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password', 20);
            $table->string('mobile', 20);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id' => 1,
            'firstname' => 'Default',
            'secondname' => 'User',
            'name' => 'Default User',
            'email' => 'default.user@gmail.com',
            'password' => Crypt::encrypt('password'),
            'mobile' => '',
            'created_at' => '2022-01-19 17:34:25',
            'updated_at' => '2022-01-19 17:34:25',
        ]);
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
