<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->dateTime('schedule_publish')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('drafted')->default(1);
            $table->boolean('deleted')->default(0);
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('media', function(Blueprint $table) {
            $table->id();
            $table->enum('type', ['img', 'video', 'att']);
            $table->string('file_name');
            $table->string('path')->nullable();
            $table->string('extension');
            $table->string('mime_type')->nullable();
            $table->integer('file_size')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('articles_media', function(Blueprint $table) {
            $table->id();
            $table->integer('id_article')->unsigned();
            $table->foreign('id_article')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('id_media')->unsigned();
            $table->foreign('id_media')->references('id')->on('media')->onDelete('cascade');
        });

        Schema::create('categories', function(Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('rank')->unsigned()->default(1);
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('articles_categories', function(Blueprint $table) {
            $table->id();
            $table->integer('id_article')->unsigned();
            $table->foreign('id_article')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles_media', function($table) {
            $table->dropForeing('articles_media_id_article_foreign');
            $table->dropForeing('articles_media_id_media_foreign');
        });
        Schema::table('articles_categories', function($table) {
            $table->dropForeing('articles_categories_id_article_foreign');
            $table->dropForeing('articles_categories_id_category_foreign');
        });
        Schema::dropIfExists('articles_categories');
        Schema::dropIfExists('articles_media');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('media');
        Schema::dropIfExists('categories');
    }
}
