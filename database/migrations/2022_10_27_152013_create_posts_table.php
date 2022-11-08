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
            $table->char('title', 255);
            $table->char('description', 255);
            $table->char('intro_text', 255);
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('published')->default(0);
            $table->integer('published_on')->nullable();
            $table->integer('pub_date')->nullable();
            $table->integer('unpub_date')->nullable();
            $table->timestamps();
            $table->softDeletes();  
            $table->index('category_id', 'post_category_idx');
            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');
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
