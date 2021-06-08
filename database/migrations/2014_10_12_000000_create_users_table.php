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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->comment("1=Admin, 2=Doctor, 3=Patients")->nullable();
            $table->integer('cancer_spacialization_id')->nullable();
            $table->integer('status')->comment("1=Active, 2=Inactive")->default('1');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        DB::table('users')->insert([
            'name'       => 'Super Admin',
            'email'      => 'admin123@yopmail.com',
            'password'   => bcrypt('password'),
            'role_id'    => '1',
            'status'     => '1', 
            'created_at' => now(),
            'updated_at' => now()
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
