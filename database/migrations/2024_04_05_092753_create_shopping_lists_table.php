<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('「買うもの」名');
            $table->unsignedBigInteger('user_id')->comment('このリストの所有者');
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->userCurrentOnUpdate();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_lists');
    }
}
