<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_shopping_lists', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 255)->comment('「買うもの」名');
            $table->unsignedBigInteger('user_id')->comment('このリストの所有者');
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            $table->date('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->userCurrentOnUpdate();
            //$table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_shopping_lists');
    }
}
