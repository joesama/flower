<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jf_step', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('fk_jf_flow')->unsigned()->nullable();
            $table->integer('fk_jfs_step')->unsigned()->nullable();
            $table->boolean('state')->nullable();
            $table->string('jfs_code')->nullable();
            $table->string('jfs_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jf_step');
    }
}
