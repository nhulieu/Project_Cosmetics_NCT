<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('PRODUCT_ID')->nullable();
            $table->boolean('COVER')->default(0);
            $table->longText('URL')->nullable();
            $table->timestamps();
        });
        Schema::table('product_image', function(Blueprint $table) {
            $table->foreign('PRODUCT_ID')->references('ID')->on('product')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_image');
    }
}
