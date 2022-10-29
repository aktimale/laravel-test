<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->char('pagetitle', 255);
            $table->char('longtitle', 255);
            $table->char('description', 255);
            $table->char('introtext', 255);
            $table->text('content');
            $table->boolean('published')->default(0);
            $table->integer('publishedon');
            $table->integer('publishedby');
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
        Schema::dropIfExists('posts');
    }
};
