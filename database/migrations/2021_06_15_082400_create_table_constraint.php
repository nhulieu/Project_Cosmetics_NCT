<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('category')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('image', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('coupon', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('product_tag', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });     

        Schema::table('order', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('order_item', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('order')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });   

        Schema::table('invoice', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('order')->onDelete('CASCADE')->onUpdate('CASCADE');    
        });
        
        Schema::table('review', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_constraint');
    }
}
