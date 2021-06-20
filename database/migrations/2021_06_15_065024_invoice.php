<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('receive_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('recipient_fname', 100)->nullable();
            $table->string('recipient_lname', 250)->nullable();
            $table->string('recipient_phone', 100)->nullable();
            $table->string('recipient_address', 100)->nullable();
            $table->integer('type')->nullable();
            $table->boolean('retired')->nullable()->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('order_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
