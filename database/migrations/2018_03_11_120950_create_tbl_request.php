<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_request', function (Blueprint $table) {
            $table->increments('request_id');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('emergency_type');
            $table->string('emergency_category');
            $table->string('location_longhitude');
            $table->string('location_latitude');
            $table->string('office_branch');
            $table->string('img_url')->nullable();
            $table->timestamp('date_requested')->nullable();
            $table->string('status');
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
