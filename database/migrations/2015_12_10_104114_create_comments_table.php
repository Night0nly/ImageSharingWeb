<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2015_11_28_093244_create_comments_table.php
        //
        Schema::create('comments',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->string('image_id');
            $table->text('comment');
            $table->timestamps();

        });
=======
//        Schema::create('comments',function(Blueprint $table){
//
//        });
>>>>>>> 94c28365c640561dda40064fbab2fc4cd18a99ab:database/migrations/2015_12_10_104114_create_comments_table.php
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
