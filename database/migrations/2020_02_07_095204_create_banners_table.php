<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_name');
            $table->string('ban_picture');
            $table->string('ban_picture_small');
            $table->text('ban_link');
            $table->text('ban_description');
            $table->string('ban_target');
            $table->string('ban_type');
            $table->string('ban_page');
            $table->string('ban_position');
            $table->integer('ban_date');
            $table->smallInteger('ban_active');
            $table->integer('ban_order');
            $table->integer('ban_end_time');
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
        Schema::dropIfExists('banners');
    }
}
