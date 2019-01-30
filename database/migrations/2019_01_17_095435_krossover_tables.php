<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KrossoverTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->integer('category_id')->length(11);
            $table->string('brand_name');
            $table->string('slug');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('name');
            $table->string('slug');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('color', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('color_name');
            $table->string('slug');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->increments('id_configuration')->length(11);
            $table->string('key');
            $table->string('value');
        });

        Schema::create('contactus', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('title');
            $table->string('alias');
            $table->string('subject');
            $table->text('content');
            $table->text('variables');
            $table->enum('status', array('active', 'inactive', ','))->default('active');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('title');
            $table->integer('main_id')->length(11);
            $table->integer('sub_id')->length(11);
            $table->integer('brand_id')->length(11)->nullable();
            $table->text('description');
            $table->double('price', 15, 8);
            $table->double('previous_price', 15, 8);
            $table->integer('stock')->length(11);
            $table->string('sizes')->nullable();
            $table->string('feature_image');
            $table->text('policy');
            $table->integer('featured')->length(1)->nullable();
            $table->integer('views')->length(11)->nullable();
            $table->enum('approved', array('yes', 'no'))->default('yes');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('product_color', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->integer('product_id')->length(11);
            $table->integer('color_id')->length(11);
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('title');
            $table->text('text');
            $table->string('image');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('image')->nullable();
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->integer('cat_id')->length(11);
            $table->string('name');
            $table->string('slug');
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_code');
            $table->string('phone');
            $table->string('password');
            $table->enum('user_type', array('admin', 'super-admin', 'user'))->default('user');
            $table->rememberToken();
            $table->enum('status', array('active', 'inactive', 'trashed'))->default('active');
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
        Schema::dropIfExists('brand');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('color');
        Schema::dropIfExists('config');
        Schema::dropIfExists('contactus');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_color');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('static_pages');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('users');
    }
}
