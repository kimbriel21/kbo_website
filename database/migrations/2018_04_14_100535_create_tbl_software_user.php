<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSoftwareUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tbl_software_user', function (Blueprint $table) {
            $table->increments('software_user_id');
            $table->unsignedInteger('register_verification_id');
            $table->foreign('register_verification_id')->references('register_verification_id')->on('tbl_register_verification')->onDelete('cascade');
            $table->string('username');
            $table->string('password');
            $table->tinyInteger('online')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
