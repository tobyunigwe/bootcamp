<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForumTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->unsignedBigInteger('topic_cat');
            $table->unsignedBigInteger('topic_user_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('topic_cat')->references('id')->on('forum_categories');
            $table->foreign('topic_user_id')->references('id')->on('users');
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
