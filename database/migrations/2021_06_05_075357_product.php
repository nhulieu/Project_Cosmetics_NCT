<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250)->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->nullable();
            $table->float('price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('tax')->nullable();
            $table->longText('feature')->nullable();
            $table->integer('mark')->nullable();
            $table->boolean('retired')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
