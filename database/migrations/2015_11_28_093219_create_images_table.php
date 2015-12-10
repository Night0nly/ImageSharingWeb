<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema:create('images',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('caption');
            $table->integer('vote_count');
            $table->string('url_path');
            $table->timestemps();
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
