<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('orders');
      Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('soda_type');
          $table->integer('amount');
          $table->integer('price');
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
      Schema::dropIfExists('orders');
      Schema::create('orders', function (Blueprint $table) {
          $table->increments('user_id');
          $table->integer('slot_1_orders');
          $table->integer('slot_2_orders');
          $table->integer('slot_3_orders');
          $table->integer('slot_4_orders');
          $table->integer('slot_5_orders');
          $table->integer('slot_1_expenses');
          $table->integer('slot_2_expenses');
          $table->integer('slot_3_expenses');
          $table->integer('slot_4_expenses');
          $table->integer('slot_5_expenses');
          $table->timestamps();
      });
    }
}
