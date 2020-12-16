<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            // untuk mengambil id dari yg berkomentar,maka user hrus login dlu, jika comment tdk bibatasi maka boleh dihapus
            $table->integer('user_id')->unsigned();
            $table->text('comment');
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type')->unsigned;
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
        Schema::dropIfExists('comments');
    }
}
