<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
//            $table->integer('admin_id', 11)->nullable()->change();
//            $table->integer('lang_id', 11)->nullable()->change();
//            $table->string('ban_name', 255)->nullable()->change();
//            $table->string('ban_picture', 255)->nullable()->change();
//            $table->string('ban_picture_small', 255)->nullable()->change();
//            $table->text('ban_link')->nullable()->change();
//            $table->text('ban_description')->nullable()->change();
//            $table->string('ban_target', 255)->nullable()->change();
//            $table->string('ban_type', 50)->nullable()->change();
//            $table->string('ban_page', 255)->nullable()->change();
//            $table->string('ban_position', 255)->nullable()->change();
//            $table->integer('ban_date', 11)->nullable()->change();
//            $table->smallInteger('ban_active', 4)->nullable()->change();
//            $table->integer('ban_order', 11)->nullable()->change();
//            $table->integer('ban_end_time', 11)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            //
        });
    }
}
