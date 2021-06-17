<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 100)->nullable(false);
            $table->string('lname', 250)->nullable();
            $table->string('email', 250)->unique();
            $table->string('username', 50)->nullable(false);
            $table->string('password', 100)->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('token')->nullable();
            $table->boolean('active')->nullable()->default(false);
            $table->float('amount_spend')->nullable();
            $table->integer('type')->unsigned()->nullable()->default(0);
            $table->boolean('retired')->nullable()->default(false);
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
        Schema::dropIfExists('user');
    }
}
